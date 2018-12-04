<?php

// Adiciona os básico para os site funcionar

// Registra os Menus da ABRAINC para uso no site

function abrainc_scripts()
{
		wp_deregister_script('jquery');
		wp_enqueue_style( 'styles', get_template_directory_uri() . '/styles/base.css',false,'1.1','all' );
		wp_register_script('jquery', ( "https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ), 'jquery-migrate', '1.10.2',false );
		wp_register_script('jquery-migrate', ( "https://code.jquery.com/jquery-migrate-1.4.0.min.js"), '', '1.4.0',false );
		wp_register_script('jquery-wookmark', ( get_template_directory_uri() . "/scripts/wookmark.min.js" ), '', '2.1.2',false);
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-migrate');
		wp_enqueue_script('jquery-wookmark');

}

add_action( 'wp_enqueue_scripts', 'abrainc_scripts' );

function register_abrainc_menus()
{
	register_nav_menus(
		array(
			'menu-navegacao-v3'      => __( 'Menu de Navegacao Principal v3' ),
			'menu-rodape-v3'         => __( 'Menu de Rodapé v3' ),
		)
	);
}

add_action( 'init', 'register_abrainc_menus' );

function remove_admin_bar(){
	show_admin_bar(false);
}

add_action('after_setup_theme', 'remove_admin_bar');


function abrainc_add_extras()
{
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
}

add_action( 'after_setup_theme', 'abrainc_add_extras' );

/* Helpers para o site
 *
 */

function catch_that_image()
{
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('//i', $post->post_content, $matches);
	$first_img = $matches [1] [0];

	if(empty($first_img))
	{ 
		//Defines a default image
		$first_img = "/images/default.jpg";
	}
	return $first_img;
}

function the_excerpt_max_charlength($charlength)
{
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength )
	{
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 )
		{
			echo mb_substr( $subex, 0, $excut );
		} 
		else
		{
			echo $subex;
		}
		echo '[...]';
	}
	else
	{
		echo $excerpt;
	}
}

function wpnextpagefix($pee) 
{
	$pee = str_replace('<!--nextpage-->','<p><!--nextpage--></p>',$pee);
	return $pee;
}

add_filter ('the_content',	'wpnextpagefix');

function custom_excerpt_length( $length )
{
	return 22;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more )
{
	return '<span>[...]</span>';
}

add_filter('excerpt_more', 'new_excerpt_more');

// Register Custom Post Type
function custom_post_type_videos()
{
	$labels = array(
		'name'									=> _x( 'Vídeos', 'Post Type General Name', 'abrainc' ),
		'singular_name'					=> _x( 'Vídeo', 'Post Type Singular Name', 'abrainc' ),
		'menu_name'							=> __( 'Vídeos', 'abrainc' ),
		'name_admin_bar'				=> __( 'Vídeos', 'abrainc' ),
		'archives'							=> __( 'Item Archives', 'abrainc' ),
		'parent_item_colon'			=> __( 'Parent Item:', 'abrainc' ),
		'all_items'							=> __( 'Todos os Ítens', 'abrainc' ),
		'add_new_item'					=> __( 'Adicionar Novo Videocast', 'abrainc' ),
		'add_new'								=> __( 'Adicionar Novo', 'abrainc' ),
		'new_item'							=> __( 'Novo Item', 'abrainc' ),
		'edit_item'							=> __( 'Editar Item', 'abrainc' ),
		'update_item'						=> __( 'Modificar Item', 'abrainc' ),
		'view_item'							=> __( 'Ver Item', 'abrainc' ),
		'search_items'					=> __( 'Buscar Item', 'abrainc' ),
		'not_found'							=> __( 'Não Encontrado', 'abrainc' ),
		'not_found_in_trash'		=> __( 'Não encontrado no Lixo', 'abrainc' ),
		'featured_image'				=> __( 'Imagem Relacionada', 'abrainc' ),
		'set_featured_image'		=> __( 'Adicionar Imagem Relacionada', 'abrainc' ),
		'remove_featured_image' => __( 'Remover Imagem Relacionada', 'abrainc' ),
		'use_featured_image'		=> __( 'Usar como Imagem Relacionada', 'abrainc' ),
		'insert_into_item'			=> __( 'Inserir no Ítem', 'abrainc' ),
		'uploaded_to_this_item' => __( 'Uploaded neste item', 'abrainc' ),
		'items_list'						=> __( 'Listagem de Ítem', 'abrainc' ),
		'items_list_navigation' => __( 'Navegação Listagem de Ítens', 'abrainc' ),
		'filter_items_list'			=> __( 'Filtragem de Ítens', 'abrainc' ),
	);
	$args = array(
		'label'									=> __( 'Vídeo', 'abrainc' ),
		'description'						=> __( 'Vídeos da Abrainc', 'abrainc' ),
		'labels'								=> $labels,
		'supports'							=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'post-formats', ),
		'taxonomies'						=> array( 'category', 'post_tag' ),
		'hierarchical'					=> false,
		'public'								=> true,
		'show_ui'								=> true,
		'show_in_menu'					=> true,
		'menu_position'					=> 5,
		'menu_icon'							=> 'dashicons-video-alt2',
		'show_in_admin_bar'			=> true,
		'show_in_nav_menus'			=> true,
		'can_export'						=> true,
		'has_archive'						=> true,
		'exclude_from_search'		=> false,
		'publicly_queryable'		=> true,
		'capability_type'				=> 'post',
	);
	register_post_type( 'videocasts', $args );
}

add_action( 'init', 'custom_post_type_videos', 0 );

// Register Custom Post Type
function custom_post_type_podcast()
{
	$labels = array(
		'name'									=> _x( 'Podcasts', 'Post Type General Name', 'abrainc' ),
		'singular_name'					=> _x( 'Podcast', 'Post Type Singular Name', 'abrainc' ),
		'menu_name'							=> __( 'Podcasts', 'abrainc' ),
		'name_admin_bar'				=> __( 'Podcasts', 'abrainc' ),
		'archives'							=> __( 'Item Archives', 'abrainc' ),
		'parent_item_colon'			=> __( 'Parent Item:', 'abrainc' ),
		'all_items'							=> __( 'Todos os Itens', 'abrainc' ),
		'add_new_item'					=> __( 'Adicionar Novo Item', 'abrainc' ),
		'add_new'								=> __( 'Adicionar Novo', 'abrainc' ),
		'new_item'							=> __( 'Novo Item', 'abrainc' ),
		'edit_item'							=> __( 'Editar Item', 'abrainc' ),
		'update_item'						=> __( 'Modificar Item', 'abrainc' ),
		'view_item'							=> __( 'Ver Item', 'abrainc' ),
		'search_items'					=> __( 'Buscar Item', 'abrainc' ),
		'not_found'							=> __( 'Não Encontrado', 'abrainc' ),
		'not_found_in_trash'		=> __( 'Não encontrado no Lixo', 'abrainc' ),
		'featured_image'				=> __( 'Imagem Relacionada', 'abrainc' ),
		'set_featured_image'		=> __( 'Mudar Imagem Relacionada', 'abrainc' ),
		'remove_featured_image' => __( 'Remover Imagem Relacionada', 'abrainc' ),
		'use_featured_image'		=> __( 'Usar como Imagem Relacionada', 'abrainc' ),
		'insert_into_item'			=> __( 'Inserir no Item', 'abrainc' ),
		'uploaded_to_this_item' => __( 'Uploaded neste item', 'abrainc' ),
		'items_list'						=> __( 'Listagem de Itens', 'abrainc' ),
		'items_list_navigation' => __( 'Navegação Listagem de Itens', 'abrainc' ),
		'filter_items_list'			=> __( 'Filtragem de Itens', 'abrainc' ),
	);
	$args = array(
		'label'									=> __( 'Podcast', 'abrainc' ),
		'description'						=> __( 'Podcasts da Abrainc', 'abrainc' ),
		'labels'								=> $labels,
		'supports'							=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'post-formats', ),
		'taxonomies'						=> array( 'category', 'post_tag' ),
		'hierarchical'					=> false,
		'public'								=> true,
		'show_ui'								=> true,
		'show_in_menu'					=> true,
		'menu_position'					=> 5,
		'menu_icon'							=> 'dashicons-format-chat',
		'show_in_admin_bar'			=> true,
		'show_in_nav_menus'			=> true,
		'can_export'						=> true,
		'has_archive'						=> true,
		'exclude_from_search'		=> false,
		'publicly_queryable'		=> true,
		'capability_type'				=> 'post',
	);
	register_post_type( 'podcasts', $args );
}

add_action( 'init', 'custom_post_type_podcast', 0 );

function add_query_vars_filter( $vars ){
  $vars[] = "dataFim";
  $vars[] = "dataInicio";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

//Criando Post Types
function create_post_type() {
    register_post_type('banners',
        array(
          'labels' => array(
              'name' => 'Banners',
              'singular_name' => 'Banner',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 10,
          'menu_icon' => 'dashicons-images-alt',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'banners')
        )
    );

    register_post_type('associadas',
        array(
          'labels' => array(
              'name' => 'Associadas',
              'singular_name' => 'Associada',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 11,
          'menu_icon' => 'dashicons-networking',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'associadas')
        )
    );

    register_post_type('apoiadores',
        array(
          'labels' => array(
              'name' => 'Apoiadores',
              'singular_name' => 'Apoiador',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 12,
          'menu_icon' => 'dashicons-groups',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'apoiadores')
        )
    );

    register_post_type('parceiros',
        array(
          'labels' => array(
              'name' => 'Parceiros',
              'singular_name' => 'Parceiro',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 13,
          'menu_icon' => 'dashicons-universal-access-alt',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'parceiros')
        )
    );    

    register_post_type('autores',
        array(
          'labels' => array(
              'name' => 'Autores',
              'singular_name' => 'Autor',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 14,
          'menu_icon' => 'dashicons-money',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'autores')
        )
    );    

    register_post_type('conquistas',
        array(
          'labels' => array(
              'name' => 'Conquistas',
              'singular_name' => 'Conquista',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 15,
          'menu_icon' => 'dashicons-awards',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'conquistas')
        )
    );

    register_post_type('evento',
        array(
          'labels' => array(
              'name' => 'Eventos',
              'singular_name' => 'Evento',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 16,
          'menu_icon' => 'dashicons-tickets',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'evento')
        )
    );    

    register_post_type('galerias',
        array(
          'labels' => array(
              'name' => 'Galerias',
              'singular_name' => 'Galeria',
          ),
          'public' => true,
          'has_archive' => true,
          'menu_position' => 17,
          'menu_icon' => 'dashicons-format-gallery',
          'supports'  => array( 'title', 'editor' ),
          'rewrite' => array('slug' => 'galerias')
        )
    );

    flush_rewrite_rules();
}    

add_action( 'init', 'create_post_type' );