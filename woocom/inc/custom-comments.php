<?php 

add_filter('comment_form_default_fields','comment_form_edit');
function comment_form_edit($xpent){
  $xpent['author'] = '<div class="col-sm-4 mb-30"><input name="author" required="" id="name" placeholder="Your name" class="form-control" type="text" ></div>';
  $xpent['email'] ='<div class="col-sm-4 mb-30"><input name="email" required="" id="email" placeholder="Email" class="form-control" type="text" ></div>';
  $xpent['url'] = '<div class="col-sm-4 mb-30"><input name="url" class="form-control" type="text" placeholder="Website" /></div>';
  $xpent['comment_field'] ='<div class="col-xs-12 mb-30"><textarea cols="30" rows="3" name="comment"  placeholder="Message" required="required"  id="message" placeholder="Your message here" rows="6" class="form-control" ></textarea></div>';
  return $xpent;
}
// second  stape 
                   
                      
                      
add_filter('comment_form_defaults','xpent_comment_from_defaults');
function xpent_comment_from_defaults($drubo){
    if( is_user_logged_in() ) {
        $xpent['comment_field'] ='<div class="col-xs-12 mb-30"><textarea cols="30" rows="3" name="comment"  placeholder="Message" required="required"  id="message" placeholder="Your message here" rows="6" class="form-control" ></textarea></div>';          
    }else{
        $xpent['comment_field'] = '';
    }
    $xpent['comment_notes_before'] = '';
    $xpent['title_reply'] = 'leave a comment';
    $xpent['title_reply_before'] = '<div class="col-xs-12"><h4>';
    $xpent['title_reply_after'] = '</h4></div>';
    $xpent['submit_button'] = '<div class="col-xs-12"><button class="btn-color" name="%1$s" type="submit" value="POST COMMENT" >send message</button></div>';
                 
    // $drubo['submit_field'] = '<div class="form-submit text-right"> %1$s %2$s </div>';
    return $xpent;
}
?>

<?php

// third  stape 
function xpent_comment_list($comment, $args, $depth){
  ?>
    <li id="comment-<?php comment_ID(); ?>">
        <div   <?php comment_class('single_comment'); ?>>

            <div class=" comment-user ">
              <!-- <img src="<?php echo get_template_directory_uri()?>/images/comment-user.jpg" alt="Xpent " />  -->
              <?php  echo get_avatar( 'rmamunur105@gmail.com', 100 ); ?>
            </div>
            <div class="comment-detail">
              <div class="user-name"> <?php comment_author(); ?></div>
              <div class="post-info">
                <ul>
                  <li><?php comment_date('d F Y'); ?></li>
                  <li> <?php comment_reply_link(array_merge($args,
                          array(
                            'depth' => $depth,
                            'max_depth' => $args['max_depth']
                          )
                        )); ?>
                    </li>
                </ul>
              </div>
              <?php comment_text(); ?>
             </div>
        </div>
    </li>


  <?php 
}

// h 


function wpb_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );