<script src="https://colorlib.com/polygon/vendors/jquery/dist/jquery.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"
    type="5c51b635906c4790b691274b-text/javascript">
</script>

<script src="https://colorlib.com/polygon/vendors/fastclick/lib/fastclick.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/nprogress/nprogress.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/iCheck/icheck.min.js" type="5c51b635906c4790b691274b-text/javascript">
</script>

<script src="https://colorlib.com/polygon/vendors/moment/min/moment.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>
<script src="https://colorlib.com/polygon/vendors/bootstrap-daterangepicker/daterangepicker.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>
<script src="https://colorlib.com/polygon/vendors/jquery.hotkeys/jquery.hotkeys.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>
<script src="https://colorlib.com/polygon/vendors/google-code-prettify/src/prettify.js"
    type="5c51b635906c4790b691274b-text/javascript">
</script>

<script src="https://colorlib.com/polygon/vendors/jquery.tagsinput/src/jquery.tagsinput.js"
    type="5c51b635906c4790b691274b-text/javascript">
</script>

<script src="https://colorlib.com/polygon/vendors/switchery/dist/switchery.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/select2/dist/js/select2.full.min.js"
    type="5c51b635906c4790b691274b-text/javascript">
</script>

<script src="https://colorlib.com/polygon/vendors/parsleyjs/dist/parsley.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/autosize/dist/autosize.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/vendors/starrr/dist/starrr.js"
    type="5c51b635906c4790b691274b-text/javascript"></script>

<script src="https://colorlib.com/polygon/build/js/custom.min.js" type="5c51b635906c4790b691274b-text/javascript">
</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="5c51b635906c4790b691274b-|49" defer=""></script>

<?php $segment1 = $this->uri->segment(1);
if ($segment1 != '') {
    ?><script src="<?php echo base_url("resources/js/modulos/$segment1.js") ?>"></script><?php
}
