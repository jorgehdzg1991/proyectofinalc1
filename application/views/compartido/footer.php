        </div> <!--wrap -->
    </div> <!-- page-content -->

    <footer role="contentinfo">
        <div class="clearfix">
            <ul class="list-unstyled list-inline">
                <li>M A T A T E N A &copy; 2016</li>
                <button class="pull-right btn btn-inverse-alt btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
            </ul>
        </div>
    </footer>

    </div> <!-- page-container -->

    <!--
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script>!window.jQuery && document.write(unescape('%3Cscript src="assets/js/jquery-1.10.2.min.js"%3E%3C/script%3E'))</script>
    <script type="text/javascript">!window.jQuery.ui && document.write(unescape('%3Cscript src="assets/js/jqueryui-1.10.3.min.js'))</script>
    -->

    <script type='text/javascript' src='<?php echo base_url("assets/js/jqueryui-1.10.3.min.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/bootstrap.min.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/enquire.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery.cookie.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery.nicescroll.min.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/plugins/codeprettifier/prettify.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/plugins/easypiechart/jquery.easypiechart.min.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/plugins/sparklines/jquery.sparklines.min.js") ?>'></script>
    <script type="text/javascript" src="<?php echo base_url("assets/plugins/form-select2/select2.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/plugins/pines-notify/jquery.pnotify.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/plugins/bootbox/bootbox.min.js") ?>"></script>
    <script type='text/javascript' src='<?php echo base_url("assets/plugins/form-toggle/toggle.min.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/placeholdr.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/application.js") ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/demo/demo.js") ?>'></script>
    <script>
        $(".select2-element").select2();

        $(document).ready(function () {
            $.fn.navegarElemento = function() {
                $('html, body').animate({
                    scrollTop: $(this).offset().top + 'px'
                }, 'fast');
                return this;
            }

            if ($("#mensajeFlash").val() !== "") {
                $.pnotify(JSON.parse($("#mensajeFlash").val()));
            }

            $("#elementoActivo > ul").css("display", "block");
        });
    </script>

    </body>
</html>