<?php

    function get_about_content($connection)
    {
        return mysqli_fetch_all(mysqli_query($connection, "SELECT `header`,`content` FROM `about_content`"), MYSQLI_ASSOC);
    }

    function get_new_password_by_activation($connection, $activation)
    {
        return mysqli_query($connection, "SELECT `new_password` FROM `users` WHERE `activation` = '$activation'");
    }

    function set_new_password($connection, $activation, $password)
    {
        return mysqli_query($connection, "UPDATE `users` SET `activation` = '', `password` ='$password',`new_password`='' WHERE `activation` LIKE '$activation'");
    }

    function set_user_activated($connection, $activation)
    {
        return mysqli_query($connection, "UPDATE `users` SET `Status` = '1',`activation`='' WHERE `activation` = '$activation'");
    }

    function add_new_password_to_user($connection, $md5_pass, $activation, $mail)
    {
        mysqli_query($connection, "UPDATE `users` SET `new_password` = '$md5_pass',`activation`='$activation'  WHERE `email` = '$mail'");
    }

    function get_password_by_login($connection, $login)
    {
        return mysqli_query($connection, "SELECT `password` FROM `users` WHERE `login`='$login'");
    }

    function set_new_password_changed_by_user($connection, $login, $md5_password)
    {
        return mysqli_query($connection, "UPDATE `users` SET `password` = '$md5_password' WHERE `users`.`login`='$login'");
    }

    function add_comment_to_news_by_user($connection, $login, $news_id, $comment_text)
    {
        return mysqli_query($connection, "INSERT INTO `news_comments`(`login`, `news_id`, `comment`) VALUES ('$login', '$news_id', '$comment_text')");
    }

    function get_comments_by_news_id($connection, $news_id)
    {
        return mysqli_query($connection, "SELECT * FROM `news_comments` WHERE `news_id`='$news_id' ORDER BY `publication_date`");
    }

    function delete_comment_by_id_no_reference($connection, $comment_id)
    {
        return mysqli_query($connection, "DELETE FROM `news_comments` WHERE `comment_id` = '$comment_id'");
    }

    function get_image_url_from_episodes_by_episode_id($connection,$episode_id)
    {
        return mysqli_query($connection, "SELECT `image_url` FROM `episodes` WHERE `episode_id` = '$episode_id'");
    }

    function delete_episode_by_episode_id($connection,$episode_id)
    {
        return mysqli_query($connection, "DELETE FROM `episodes` WHERE `episode_id` = '$episode_id'");
    }
    function get_image_url_from_image_gallery($connection,$image_id)
    {
        return mysqli_query($connection, "SELECT `image_url` FROM `image_gallery` WHERE `image_id` = '$image_id'");
    }
    function delete_from_image_gallery_by_image_id($connection, $image_id)
    {
        return mysqli_query($connection, "DELETE FROM `image_gallery` WHERE `image_id` = '$image_id'");
    }
    function get_image_url_from_news_by_news_id($connection,$news_id)
    {
        return mysqli_query($connection, "SELECT `image_url` FROM `news` WHERE `news_id` = '$news_id'");
    }
    function delete_from_news_by_news_id($connection,$news_id)
    {
        return mysqli_query($connection, "DELETE FROM `news` WHERE `news_id` = '$news_id'");
    }
    function get_password_from_users_by_login($connection,$login)
    {
        return mysqli_query($connection, "SELECT `password` FROM `users` WHERE `login`='$login'");
    }
    function delete_from_users_by_login($connection,$login){
        return mysqli_query($connection, "DELETE FROM `users` WHERE `users`.`login` = '$login'");
    }
    function get_episode_by_episode_id($connection,$episode_id)
    {
        return mysqli_query($connection, "SELECT * FROM `episodes` WHERE `episode_id`= $episode_id");
    }
    function get_next_episode_id_by_publiation_date($connection,$publication_date)
    {
        return mysqli_query($connection, "SELECT `episode_id` FROM `episodes` WHERE `publication_date` >'$publication_date' ORDER BY `publication_date` LIMIT 1");
    }
    function get_prev_episode_id_by_publication_date($connection,$publication_date)
    {
        return mysqli_query($connection, "SELECT `episode_id` FROM `episodes` WHERE `publication_date` <'$publication_date' ORDER BY `publication_date` DESC LIMIT 1 "
        );
    }
    function add_new_episode_by_everything($connection,$name,$description,$img)
    {
        mysqli_query($connection, "INSERT INTO `episodes` (`name`, `description`,`image_url`) VALUES ('$name', '$description','$img')");
        mysqli_query($connection, "UPDATE `episodes` SET `number`=`episode_id` WHERE `name`= '$name'");
    }
    function update_episode_with_image($connection,$episode_id,$name,$description,$img){
        return mysqli_query($connection, "UPDATE `episodes` SET `name`='$name', `description`='$description', `image_url`= '$img' WHERE `episode_id`='$episode_id'");
    }
    function update_episode_without_image($connection,$episode_id,$name,$description){
        return mysqli_query($connection, "UPDATE `episode` SET `name`='$name', `description`='$description' WHERE `episode_id`='$episode_id'");
    }
    function get_images_from_gallery_order_by_publication_date($connection){
        return mysqli_query($connection, "SELECT * FROM `image_gallery` ORDER BY `publication_date`");
    }
    function add_image_to_gallery($connection,$img,$description)
    {
        return mysqli_query($connection, "INSERT INTO `image_gallery`(`description`, `image_url`) VALUES ('$description', '$img')");
    }
    function get_all_news_short($connection){
        return mysqli_query($connection, "SELECT * FROM `news` ORDER BY `publication_date` DESC ");
    }
    function get_episodes_ids($connection){
        return mysqli_query($connection, "SELECT `episode_id` FROM `episodes`");
    }
    function get_password_and_status_from_users_by_login($connection,$possible_login){
        return mysqli_query($connection, "SELECT `password`, `status` FROM `users` WHERE `login` LIKE '$possible_login'");
    }
    function get_news_by_news_id($connection,$news_id){
        return mysqli_query($connection, "SELECT * FROM `news` WHERE `news_id`= '$news_id'");
    }
    function get_next_news_id_by_publication_date($connection,$publication_date){
        return  mysqli_query($connection, "SELECT `news_id` FROM `news` WHERE `publication_date` >'$publication_date' ORDER BY `publication_date` LIMIT 1");
    }
    function get_prev_news_id_by_publication_date($connection,$publication_date){
        return mysqli_query($connection, "SELECT `news_id` FROM `news` WHERE `publication_date` <'$publication_date' ORDER BY `publication_date` DESC LIMIT 1 ");
    }
    function add_news_by_content_header_img($connection,$content,$header,$img){
        return mysqli_query($connection, "INSERT INTO `news`(`header`, `content`,`image_url`) VALUES ('$header', '$content','$img')");;
    }