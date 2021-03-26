
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Conversion HTML Class - Emoji One Labs</title>

  <!-- Emoji One CSS: -->
  <link rel="stylesheet" href="http://lalanii.com/emojione-master/assets/css/emojione.min.css" type="text/css" media="all" />

  <!-- jQuery: -->
  <script async src="http://cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>

 
  <!-- Typekit: -->
  <script async type="text/javascript" src="http://use.typekit.net/ivu8ilu.js"></script>
  <script async type="text/javascript">try{Typekit.load();}catch(e){}</script>


  <!-- Syntax Highlighting -->
  <script async type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shCore.js"></script>
  <script async type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushXml.js"></script>
  <script async type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushJScript.js"></script>
  <script async type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushCss.js"></script>
  <script async type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushPhp.js"></script>
  <script async type="text/javascript">SyntaxHighlighter.all();</script>
  <link  rel="stylesheet" href="http://lalanii.com/emojione-master/demos/styles/shCoreRDark.css"/>

  <!-- Emoji One JS -->

  <script async src="http://lalanii.com/emojione-master/lib/js/emojione.js"></script>

  <script async type="text/javascript">
    // #################################################
    // # Optional

    // default is PNG but you may also use SVG
    emojione.imageType = 'svg';

    // default is ignore ASCII smileys like :) but you can easily turn them on
    emojione.ascii = true;

    // if you want to host the images somewhere else
    // you can easily change the default paths
    emojione.imagePathPNG = 'http://lalanii.com/emojione-master/assets/png/';
    emojione.imagePathSVG = 'http://lalanii.com/emojione-master/assets/svg/';

    // #################################################
  </script>

</head>
<body>


<main>

  <div class="container">


      <div class="output">
        <h3>Output:</h3>
        <p class="convert-emoji">
            Welcome to this Emoji One :snail: demo! &#x1f604;
            I hope you like what we've put together here for you. :thumbsup: :smile:
        </p>

        <script async type="text/javascript">
          $(document).ready(function() {
            $(".convert-emoji").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });
          });
        </script>
      </div>

    </div>

     
   

  </div>

</main>


</body>
</html>