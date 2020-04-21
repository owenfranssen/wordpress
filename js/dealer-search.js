const search = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?=get_template_directory_uri()?>/includes/search.dealers.php',
});

function setSelected(t) {
  jQuery('.search-box input[name=link]').val(t.link);
}

jQuery(function($) {
  $('input#search').typeahead(
    {
      highlight: true,
      minlength: 1,
    },
    {
      display: 'name',
      name: 'name',
      source: search,
      templates: {
        empty: [
          '<div class="empty-message">',
          'We could not find any dealers to match your search.',
          '</div>',
        ].join('\n'),
        suggestion: Handlebars.compile('<div class="align-middle"><b>{{name}}</b>{{display}}</div>'),
      },
    },
  ).on('typeahead:render', (e, suggestions) => {
    if (typeof suggestions !== 'undefined') {
      $('.search-box input[name=search]').data('suggested', suggestions.town);

      setSelected(suggestions);
    }
  }).on('typeahead:select typeahead:autocomplete', (e, selected) => {
    setSelected(selected);
    $('#searchform').submit();
  })
    .focus();

  $('.search-box').submit( function() {
    if($(this).find('input[name=link]').val() != '') {
      window.location = $('.search-box input[name=link]').val();
    }
    return false;
  })

  
});