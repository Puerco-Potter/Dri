<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' >
    <META NAME='Description' content='Pan and zoom DOM  elements demo '>
    <meta name='keywords' content='dom, pan, zoom' />
    <meta name='author' content='Andrei Kashcha'>
    <meta name='title' content='DOM panzoom demo' />
    <title>DOM panzoom demo</title>
    <style type="text/css" media="screen">
body, html {
  position: fixed;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}
    </style>
  </head>
  <body>
<div id="lipsum" class='zoomable'>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam enim lectus, euismod ac metus eget, consequat aliquam augue. Fusce vestibulum sagittis massa, eget iaculis lorem malesuada ut. Curabitur fringilla a lectus sed suscipit. Sed mollis ligula blandit ipsum posuere, et luctus sem iaculis. Suspendisse scelerisque mollis dapibus. Sed elementum placerat lacus, ac rutrum mauris varius in. Sed malesuada, ipsum in facilisis facilisis, eros massa euismod odio, id pretium augue purus sed risus. Nulla vitae purus enim. Suspendisse placerat ac turpis sed tempor. Cras et vulputate eros. Aenean volutpat tincidunt erat eu aliquam. Sed vel ex pulvinar, rutrum velit at, ullamcorper nibh. Ut ac rhoncus nulla. Pellentesque eu orci eu libero semper commodo ac sit amet massa.
</p>
<p>
Donec condimentum odio ut lorem rhoncus pharetra. Maecenas nisl mi, faucibus ut tincidunt eu, lobortis at nunc. Suspendisse ut ipsum nec libero pharetra porta. Mauris porttitor neque nec mi rhoncus, a luctus massa consectetur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed varius mauris et volutpat dignissim. Maecenas consectetur porta mollis. Morbi quis hendrerit massa. Cras vel eros vitae nisi mollis volutpat blandit id est. Vivamus fringilla iaculis lacus eu aliquet. Ut a varius augue, et accumsan nulla. Integer eu sem non erat porttitor posuere. Sed dui tortor, aliquam sed volutpat vitae, sodales non enim. Vestibulum libero nulla, tempus blandit pretium ac, ullamcorper eu nisl.
</p>
<p>
Aenean quis rhoncus ante. Maecenas euismod non lacus nec accumsan. Integer vitae sollicitudin lacus. Aliquam in justo augue. Pellentesque nisl nisi, sollicitudin sed commodo vitae, vestibulum eget est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor laoreet lectus sit amet eleifend. Curabitur tempus est nunc, vel molestie mauris congue vel. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent tincidunt aliquam massa, at ornare lacus tincidunt et.
</p>
<p>
Nam posuere et ante in finibus. Proin sagittis iaculis lacus, scelerisque convallis nulla porttitor ac. Nunc sagittis velit vitae pharetra dapibus. Etiam tortor ante, facilisis a odio sed, pretium vehicula dui. Proin et pellentesque lacus, ac tristique nibh. Pellentesque vitae ex a justo fringilla pharetra. Aenean accumsan tempor sollicitudin. Integer elementum, quam at commodo vestibulum, odio massa egestas nibh, nec hendrerit lacus diam eget nisi. Integer pretium pretium purus, eu ornare ipsum posuere id. Nullam eget varius magna, ac blandit tellus. In hac habitasse platea dictumst. Praesent volutpat, purus quis rhoncus faucibus, orci lacus dictum purus, sed sagittis ligula ante ut augue. Curabitur eget est quis erat volutpat mattis. Aliquam eleifend ut tortor eu ultrices.
</p>
<p>
Integer pretium erat et elit bibendum, ut laoreet tortor rutrum. Donec pulvinar faucibus enim vel molestie. Donec et euismod urna. Vestibulum nec feugiat magna. Nam at nunc lorem. Fusce sed ante eu purus posuere vulputate. In hac habitasse platea dictumst. Fusce consectetur elit a magna faucibus euismod. Ut congue efficitur ex. In dictum velit ac arcu condimentum, hendrerit venenatis dui tincidunt. Vestibulum pulvinar purus elementum felis tempus tincidunt. Aenean convallis, leo eu interdum varius, ante dui volutpat urna, a pharetra risus felis mattis mauris. Cras tincidunt justo enim, faucibus commodo nisl fringilla sed. Nullam facilisis, nisl a tincidunt euismod, purus odio sollicitudin sem, at ornare lorem sem ac nisi. Etiam a tincidunt tortor, consectetur porta nisl. Phasellus diam arcu, dapibus finibus nisi facilisis, dictum rutrum leo.
</p></div>
    <p class='header'>
      Drag it or zoom it...
    </p>
    <script src='https://cdn.rawgit.com/anvaka/panzoom/v6.1.3/dist/panzoom.min.js'></script>
    <script>
var area = document.querySelector('.zoomable')
panzoom(area)
    </script>
<a href="https://github.com/anvaka/panzoom"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
  </body>
</html>