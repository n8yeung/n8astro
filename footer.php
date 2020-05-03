<?php get_template_part('parts/contacts'); ?>

<footer>
    <div class="footer">
        <?php if ( is_active_sidebar( 'footer_copyright_text' ) ) { dynamic_sidebar( 'footer_copyright_text' ); } ?>
    </div>
</footer>
<?php wp_footer() ?>
</div><!-- /.container -->

</body>
</html>
