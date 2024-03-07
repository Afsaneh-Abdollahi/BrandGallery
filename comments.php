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

<div class="row">
    <div class="col-lg-12">
        <div class="comment_box">

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
                        //                                    'max_depth'			=> 5,
                        'reply_text'		=> '<i class="icon-reply"></i>',
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
<div class="title">
    <h2>نظر دهید</h2>
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
                        <textarea placeholder="نظر شما" required id="comment" name="comment" rows="8" ></textarea>
                     </div>
                 </div>
                 <div class="row">',
            'submit_field' =>
                '<div class="col-lg-12">
                        
                            <button class="btn_yellow" type="submit">ارسال نظر</button>
                            <input type="hidden" name="comment_post_ID" value="' . get_the_ID() . '" id="comment_post_ID">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row">',
            'fields' => array(
                'author' =>
                    '<div class="col-lg-4">
                    <input type="text" placeholder="نام و نام خانوادگی" required id="author" name="author">
                </div>',
                'email' =>
                    ' <div class="col-lg-4">
                    <input type="text" placeholder="ایمیل" required id="email" name="email">
                </div>',
                'subject' =>
                    '<div class="col-lg-4">
                    <input type="text" placeholder="موضوع" required id="subject" name="subject">
                </div></div>',
            ));
        comment_form($args);
        ?>
    </div>
</div>
