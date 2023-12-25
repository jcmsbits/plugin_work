<?php

function work_script_registro(){
    wp_register_script("work_registro",plugins_url("../assets/js/registro.js",__FILE__), array(),null);
}


add_action( 'wp_enqueue_scripts', 'conditionally_enqueue_styles_scripts' );
function conditionally_enqueue_styles_scripts() {
    if ( is_page('sign-up') ) {
        wp_register_style( 'custom-design', plugins_url('../../style.css',__FILE__) );
        wp_enqueue_style( 'custom-design' );
    }
}

add_action("wp_enqueue_scripts", "work_script_registro");

function work_add_registre_form(){
    wp_enqueue_script("work_registro");
  
    $response = '
    <div class="signin">
        <div class="signin__container">
            <h1 class="sigin__titulo">Register</h1>
            <form class="signin__form" id="signin">
                <div class="signin__name name--campo">
                    <label for="Name">Name</label>
                    <input name="name" type="text" id="Name">
                </div>
                <div class="signin__email name--campo">
                    <label for="email">Email</label>
                    <input name="email" type="email" id="email">
                </div>
                <div class="signin__pass name--campo">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password">
                </div>
                <div class="signin__submit">
                    <input type="submit" value="Create">
                </div>
                <div class= "msg"></div>
            </form>
        </div>
    </div>
    ';
    return $response;
}

add_shortcode("plz_registro","work_add_registre_form");


?>