<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'outlane'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
           name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>


<p><label for="<?php echo $this->get_field_id('api_key'); ?>"><?php esc_html_e('Dribbble Api Key:', 'outlane'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('api_key'); ?>"
           name="<?php echo $this->get_field_name('api_key'); ?>" type="text" value="<?php echo $api_key; ?>"/></p>


<p><label for="<?php echo $this->get_field_id('username'); ?>"><?php esc_html_e('Dribbble Username:', 'outlane'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>"
           name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>"/></p>


<p><input class="checkbox" type="checkbox"<?php checked($is_team); ?>
          id="<?php echo $this->get_field_id('is_team'); ?>"
          name="<?php echo $this->get_field_name('is_team'); ?>"/>
    <label for="<?php echo $this->get_field_id('is_team'); ?>"><?php esc_html_e('Is it a team account?', 'outlane'); ?></label></p>


<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e('Number of shots to show:', 'outlane'); ?></label>
    <input class="tiny-text" id="<?php echo $this->get_field_id('number'); ?>"
           name="<?php echo $this->get_field_name('number'); ?>" type="number" step="1" min="1"
           value="<?php echo $number; ?>" size="3"/></p>


<p><input class="checkbox" type="checkbox"<?php checked($show_stats); ?>
          id="<?php echo $this->get_field_id('show_stats'); ?>"
          name="<?php echo $this->get_field_name('show_stats'); ?>"/>
    <label for="<?php echo $this->get_field_id('show_stats'); ?>"><?php esc_html_e('Show stats', 'outlane'); ?></label></p>


<p><input class="checkbox" type="checkbox"<?php checked($show_follow_btn); ?>
          id="<?php echo $this->get_field_id('show_follow_btn'); ?>"
          name="<?php echo $this->get_field_name('show_follow_btn'); ?>"/>
    <label for="<?php echo $this->get_field_id('show_follow_btn'); ?>"><?php esc_html_e('Show follow button', 'outlane'); ?></label></p>


<p><label for="<?php echo $this->get_field_id('follow_btn_text'); ?>"><?php esc_html_e('Follow button text:', 'outlane'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('follow_btn_text'); ?>"
           name="<?php echo $this->get_field_name('follow_btn_text'); ?>" type="text" value="<?php echo $follow_btn_text; ?>"/></p>


<p><input class="checkbox" type="checkbox"<?php checked($show_followers_count); ?>
          id="<?php echo $this->get_field_id('show_followers_count'); ?>"
          name="<?php echo $this->get_field_name('show_followers_count'); ?>"/>
    <label for="<?php echo $this->get_field_id('show_followers_count'); ?>"><?php esc_html_e('Show followers count', 'outlane'); ?></label></p>