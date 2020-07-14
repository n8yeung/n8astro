<footer>
    <?php if (is_front_page()) {
        get_template_part('parts/contactus');
    } ?>
    <div class="footer">
        <?php if ( is_active_sidebar( 'footer_copyright_text' ) ) { dynamic_sidebar( 'footer_copyright_text' ); } ?>
    </div>
</footer>
<?php wp_footer() ?>
</div><!-- /.container -->

</body>
</html>
