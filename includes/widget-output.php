<div class="ol-recent-shots">

    <?php

    if ($is_team) {
        $account_type = 'teams';
    } else {
        $account_type = 'users';
    }

    $url = 'https://api.dribbble.com/v1/'.$account_type.'/'.$username.'/shots?per_page='.$number.'&access_token='.$api_key;
    $content = file_get_contents($url);
    $dribbble_json = json_decode($content, true);

    foreach($dribbble_json as $shot){
        ?>

        <div class="__shot">
            <a target="_blank" class="__shot-link" href="https://dribbble.com/shots/<?php echo $shot['id'].'-'.$shot['title'];?>" title="<?php echo $shot['title'];?>">
                <img class="__img" src="<?php echo $shot['images']['normal'];?>">
                <?php
                if($show_stats) {
                    ?>
                    <span class="__views">
                        <img src="<?php echo $img_path.'eye.svg'?>">
                        <?php echo $shot['views_count'];?>
                    </span>
                    <span class="__comments">
                        <img src="<?php echo $img_path.'comment.svg'?>">
                        <?php echo $shot['comments_count'];?>
                    </span>
                    <span class="__likes">
                        <img src="<?php echo $img_path.'heart.svg'?>">
                        <?php echo $shot['likes_count'];?>
                    </span>
                <?php
                }?>
            </a>
        </div>

        <?php
    }
    ?>
</div>

<?php
if ($show_follow_btn) {
    $url = 'https://api.dribbble.com/v1/users/'.$username.'?access_token='.$api_key;
    $content = file_get_contents($url);
    $dribbble_json = json_decode($content, true);
    ?>

    <a class="ol-follow-btn" target="_blank" href="https://dribbble.com/<?php echo $username; ?>">
        <span class="__dribbble-icon">
            <img src="<?php echo $img_path.'dribbble.svg'?>">
        </span>
        <span class="__btn-title"><?php echo $follow_btn_text; ?></span>
        <?php if($show_followers_count) { ?>
            <span class="__followers-count">
                <img src="<?php echo $img_path.'user.svg'?>">
                <?php echo $dribbble_json['followers_count']; ?>
            </span>
        <?php }?>
    </a>
    <?php
}
    ?>