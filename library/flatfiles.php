<?php 
 function artspace_flatfile() {

	$labels = array(
		'name'                => _x( 'Flatfiles', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Flatfile', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Flatfiles', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent File:', 'text_domain' ),
		'all_items'           => __( 'All Flatfiles', 'text_domain' ),
		'view_item'           => __( 'View File', 'text_domain' ),
		'add_new_item'        => __( 'Add New Flatfile', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit File', 'text_domain' ),
		'update_item'         => __( 'Update File', 'text_domain' ),
		'search_items'        => __( 'Search Flatfiles', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'flatfiles', 'text_domain' ),
		'description'         => __( 'Flatfiles', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-tagcloud',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'flatfiles', $args );

}

// Hook into the 'init' action
add_action( 'init', 'artspace_flatfile', 0 );


/// Create Settings Area for Flatfiles
class flatfiles_Admin {
	private $key = 'flatfile_options';
	protected $option_metabox = array();
	protected $title = '';
	protected $options_page = '';

	public function __construct() {
		// Set our title
		$this->title = __( 'Flatfile Options', 'flatfiles' );

		// Set our CMB2 fields
		$this->fields = array(
			array(
				'name' => __( 'Section Title', 'flatfiles' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
			    'name' => 'Main Image',
			    'desc' => 'Upload an image or enter an URL.',
			    'id' => 'main_image',
			    'type' => 'file',
			    // 'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
		    'name' => 'Info',
		    'id' => 'info',
		    'type' => 'textarea'
			)
			
		);
 	}

	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}

	public function init() {
		register_setting( $this->key, $this->key );
	}

	public function add_options_page() {
		$this->options_page = add_submenu_page( 'edit.php?post_type=flatfiles', $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
	}

	public function admin_page_display() {
		?>
		<div class="wrap cmb2_options_page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->option_metabox(), $this->key ); ?>
		</div>
		<?php
	}

	public function option_metabox() {
		return array(
			'id'         => 'option_metabox',
			'show_on'    => array( 'key' => 'options-page', 'value' => array( $this->key, ), ),
			'show_names' => true,
			'fields'     => $this->fields,
		);
	}

	public function __get( $field ) {

		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'fields', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}
		if ( 'option_metabox' === $field ) {
			return $this->option_metabox();
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

$flatfiles_Admin = new flatfiles_Admin();
$flatfiles_Admin->hooks();

function myprefix_get_option( $key = '' ) {
	global $products_Admin;
	return cmb2_get_option( $flatfiles_Admin->key, $key );
}