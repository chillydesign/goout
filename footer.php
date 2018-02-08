<!-- footer -->
<footer class="footer" role="contentinfo">

    <div class="container">

        <div class="row">
            <nav id="footer_nav" class="col-sm-8">
                <ul><?php chilly_nav('footer-navigation'); ?></ul>
            </nav>
            <div  id="social_media_link" class="col-sm-4">
                <?php get_template_part('partials/social-buttons'); ?>
            </div>
        </div>


        <p class="copyright">&copy; <?php echo date('Y'); ?>  Go Out! Magazine Culturel Genevois – arts, culture &amp; lifestyle à Genève et en Suisse. Website by <a target="_blank" href="//webfactor.ch" title="Webfactor">Webfactor</a>.</p>
    </div>

</footer>
<!-- end of footer -->
</div>
<!-- end of pushy div -->

<?php wp_footer(); ?>
<?php $tdu = get_template_directory_uri(); ?>
<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/scripts.bundle.js?v=<?php echo wf_version(); ?>"></script>
<script>
// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
// (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
// l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
// ga('send', 'pageview');
</script>

<div id="nav_overlay"></div>

</body>
</html>
