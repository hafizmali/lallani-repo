<script type="text/javascript">
          $(document).ready(function() {
            $(".blogtitle").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });
			$(".blogdetail").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });
          });
        </script>