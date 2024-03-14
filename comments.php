<!--<div id="comments" class="comments">-->
<!--  --><?php //if (post_password_required()) : ?>
<!--    <p>--><?php //esc_html_e('Post is password protected. Enter the password to view any comments.', 'wp-blank'); ?><!--</p>-->
<!--    </div>-->
<!--  --><?php //return; endif; ?>
<!--  --><?php //if(have_comments()): ?>
<!--    <h2>--><?php //comments_number(); ?><!--</h2>-->
<!--    <ul>-->
<!--      --><?php //wp_list_comments(); ?>
<!--    </ul>-->
<!--  --><?php //elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
<!--    <p>--><?php //esc_html_e('Comments are closed here.', 'wp-blank'); ?><!--</p>-->
<!--  --><?php //endif; ?>
<!--  --><?php //comment_form(); ?>
<!--</div>-->

<div class="title">
    دیدگاهتان را بنویسید
</div>
<div class="row">
    <div class="col-lg-12">
        <?php
        $args = array(

            'title_reply' => '',
            'logged_in_as' => '',
            'class_form' => 'form',
            'comment_notes_before' => '',
            'comment_field' =>
                '<div class="row">
                    <div class="col-lg-12">
                        <textarea placeholder="متن دیدگاه" required id="comment" name="comment" rows="7" ></textarea>
                     </div>
                 </div>',
            'fields' => array(
                'author' =>
                    '<div class="row"><div class="col-lg-4">
                        <input type="text" required placeholder="نام و نام خانوادگی" id="author" name="author">              
                    </div>',
                'email' =>
                    '<div class="col-lg-4">
                        <input type="text" required placeholder="ایمیل" id="email" name="email">
                    </div>',
                'mobile' =>
                    '<div class="col-lg-4">
                        <input type="text" required placeholder="شماره همراه" id="mobile" name="mobile">
                    </div></div>',
            ),
            'submit_field' =>
                '<div class="row"><div class="col-lg-12">
                            <button class="btn-submit-comment primary_btn" type="submit">ارسال دیدگاه</button>
                            <input type="hidden" name="comment_post_ID" value="' . get_the_ID() . '" id="comment_post_ID">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        <div class="clearfix"></div>
                    </div>
                </div>'
        );
        comment_form($args);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="comment_box">
            <div class="title">
                نظرات کاربران
            </div>
            <?php
            function top_comment($comment, $args, $depth)
            {

                if ('div' === $args['style']) {
                    $tag = 'div';
                    $add_below = 'comment';
                } else {
                    $tag = 'li';
                    $add_below = 'div-comment';
                } ?>
                <!-- comment -->


                <div class="comment">
                    <div class="comment-in">
                        <div class="author">
                            <i class="icon-reply"></i>
                            <i class="icon-user"></i>
                            <p><?php echo $comment->comment_author; ?></p>
                        </div>
                        <div class="author_comment">
                            <?php comment_text(); ?>
                        </div>
                        <div class="date">
                            <?php echo get_comment_date(); ?>
                        </div>
                    </div>
                </div>
                <!-- /comment -->
                <?php
            }

            ?>

            <?php

            if (count($comments)) : ?>
                <ul>

                    <?php

                    wp_list_comments(array(
                        'avatar_size' => 32,
                        'style' => 'li',
                        'class' => 'comment',
                        'short_ping' => true,
                        'type' => 'comment',
                        'callback' => 'top_comment',
                        'max_depth' => 5,
                        'reply_text' => '<i class="icon-reply"></i>',
                    ));

                    ?>
                </ul>

                <div class="row text-center">
                    <div class="col-md-12">
                        <?php paginate_comments_links(array('type' => 'list', 'prev_text' => __('قبلی'), 'next_text' => __('بعدی'))) ?>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>