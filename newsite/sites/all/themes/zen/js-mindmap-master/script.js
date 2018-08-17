// load the mindmap
jQuery(document).ready(function() {
  // enable the mindmap in the body
  jQuery('body').mindmap();

  // add the data to the mindmap
  var root = jQuery('body>ul>li').get(0).mynode = jQuery('body').addRootNode(jQuery('body>ul>li>a').text(), {
    href:'/',
    url:'/',
    onclick:function(node) {
      $(node.obj.activeNode.content).each(function() {
        this.hide();
      });
    }
  });
  
  jQuery('body>ul>li').hide();
  var addLI = function() {
    var parentnode = jQuery(this).parents('li').get(0);
    if (typeof(parentnode)=='undefined') parentnode=root;
      else parentnode=parentnode.mynode;
    
    this.mynode = jQuery('body').addNode(parentnode, jQuery('a:eq(0)',this).text(), {
//          href:$('a:eq(0)',this).text().toLowerCase(),
      href:jQuery('a:eq(0)',this).attr('href'),
      onclick:function(node) {
        jQuery(node.obj.activeNode.content).each(function() {
          this.hide();
        });
        jQuery(node.content).each(function() {
          this.show();
        });
      }
    });
    jQuery(this).hide();
    jQuery('>ul>li', this).each(addLI);
  };
  jQuery('body>ul>li>ul').each(function() { 
    jQuery('>li', this).each(addLI);
  });

});   