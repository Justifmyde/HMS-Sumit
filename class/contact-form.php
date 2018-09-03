<?php
class SPCF_ContactForm {
	const post_type = 'spcf_contact_form';

	private static $found_items = 0;
	private static $current = null;

	private $id;
	private $name;
	private $title ="untitle";
	private $content='{"fields":[{"label":"Your Name","field_type":"text","required":true,"field_options":{},"cid":"c1"},{"label":"your-email","field_type":"email","required":true,"field_options":{},"cid":"c1"},{"label":" your-subject","field_type":"text","required":false,"field_options":{},"cid":"c1"},{"label":"Message","field_type":"textarea","required":true,"field_options":{"size":"small","min_max_length_units":"characters"},"cid":"c11"},{"label":"Untitled","field_type":"submit","required":true,"field_options":{},"cid":"c15"}]}';
	private $properties = array();
	private $unit_tag;
	private $responses_count = 0;
	private $scanned_form_tags;

	public static function count() {
		return self::$found_items;
	}

	public static function get_current() {
		return self::$current;
	}

	public static function register_post_type() {
		register_post_type( self::post_type, array(
			'labels' => array(
				'name' => __( 'Contact Forms', 'spicy-form' ),
				'singular_name' => __( 'Contact Form', 'spicy-form' ) ),
			'rewrite' => false,
			'query_var' => false ) );
	}
	public static function find( $args = '' ) {
		$defaults = array(
			'post_status' => 'any',
			'posts_per_page' => -1,
			'offset' => 0,
			'orderby' => 'ID',
			'order' => 'ASC' );

		$args = wp_parse_args( $args, $defaults );

		$args['post_type'] = self::post_type;
		
		
		$q = new WP_Query();
		$posts = $q->query( $args );

		self::$found_items = $q->found_posts;

		$objs = array();

		foreach ( (array) $posts as $post )
			$objs[] = new self( $post );

		return $posts;
		
	}
	public static function item_count( $args = '' ) {
		$defaults = array(
			'post_status' => 'any',			
			'offset' => 0,
			'orderby' => 'ID',
			'order' => 'ASC' );

		$args = wp_parse_args( $args, $defaults );

		$args['post_type'] = self::post_type;
		
		
		$q = new WP_Query();
		$posts = $q->query( $args );

		self::$found_items = $q->found_posts;

		$objs = array();

		foreach ( (array) $posts as $post )
			$objs[] = new self( $post );

		return $posts;
		
	}
	
	public function __construct( $post = null ) {
		$post = get_post( $post );

		if ( $post && self::post_type == get_post_type( $post ) ) {
			$this->id = $post->ID;
			$this->name = $post->post_name;
			$this->title = $post->post_title;
			$this->content = $post->post_content;
			$this->locale = get_post_meta( $post->ID, '_locale', true );

			
		}

		do_action( 'spcf_contact_form', $this );
	}
	public function id() {
		return $this->id;
	}
	public function content()
	{ return $this->content;}
public function initial() {
		return empty( $this->id );
	}

	public function prop( $name ) {
		$props = $this->get_properties();
		return isset( $props[$name] ) ? $props[$name] : null;
	}
public static function get_template( $args = '' ) {
		global $l10n;

		$defaults = array( 'locale' => null, 'title' => '' );
		$args = wp_parse_args( $args, $defaults );

		$locale = $args['locale'];
		$title = $args['title'];

		

		self::$current = $contact_form = new self;
		$contact_form->title =
			( $title ? $title : __( 'Untitled', 'spicy-form' ) );
		$contact_form->locale = ( $locale ? $locale : get_locale() );

		

		return $contact_form;
	}
	public static function get_instance( $post ) {
		$post = get_post( $post );

		if ( ! $post || self::post_type != get_post_type( $post ) ) {
			return false;
		}

		self::$current = $contact_form = new self( $post );

		return $contact_form;
	}
	public function title() {
		return $this->title;
	}
	public  function save() {
		//$props = $this->get_properties();

		$post_content = $_POST['spcf_form'];
		
		
		
		if ( $_POST['post_action'] == 'add_new') {
			$this->title = $_POST['spcf-title'];
			$post_id = wp_insert_post( array(
				'post_type' => self::post_type,
				'post_status' => 'publish',	
				'post_title' => $this->title,
				'post_content' => trim( $post_content ) ) );
				
		} else {
			$this->id = $_POST['post_ID'];
			$this->title = $_POST['spcf-title'];
			$post_id = wp_update_post( array(
				'ID' => (int) $this->id,
				'post_status' => 'publish',
				'post_title' => $this->title,
				'post_content' => trim( $post_content ) ) );
				echo $post_id." that post updeta";
				
		}

		
	
		return $post_id;
	}
}

function spcf_get_current_contact_form() {
	if ( $current = SPCF_ContactForm::get_current() ) {
		return $current;
	}
}
function spcf_contact_form( $id ) {
	return SPCF_ContactForm::get_instance( $id );
}

function spcf_shortcode_func( $atts) {
	ob_start();
	 extract(shortcode_atts(array(
      'id' => 1,
   ), $atts));
	//global $spcf_error;
	$post_7 = get_post($id); 
	if(!empty($post_7))
	{	
		
	$post_content = $post_7->post_content;
	
	 $spcf_design_effact=get_post_meta($id, 'spcf_effact',true );
		if($spcf_design_effact=='floating-label')
		{
							
			wp_enqueue_style( 'spcf-matrial-css', plugins_url( '/assets/css/materialize_float_label.css', dirname(__FILE__)) );
			wp_enqueue_style( 'spcf-matrial-css', plugins_url( '/assets/css/floatlabel.css', dirname(__FILE__)) );
			wp_enqueue_style( 'spcf-ripple-css', plugins_url( '/assets/css/jquery.ripple.css', dirname(__FILE__)) );
			
			wp_enqueue_script( 'spcf-matrial-materialize', plugins_url( '/assets/js/materialize.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
			wp_enqueue_script( 'spcf-matrial-init', plugins_url( '/assets/js/init.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
			wp_enqueue_script( 'spcf-floatinglabel-jquery', plugins_url( '/assets/js/floatinglabel.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
			wp_enqueue_script( 'spcf-awesomelabel-jquery', plugins_url( '/assets/js/awesomelabel.min.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
			wp_enqueue_script( 'spcf-ripple-jquery', plugins_url( '/assets/js/jquery.ripple.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
						
		}
		else
		{
			wp_enqueue_style( 'spcf-matrial-css', plugins_url( '/assets/css/materialize.css', dirname(__FILE__)) );
			wp_enqueue_script( 'spcf-matrial-jquery-timeago', plugins_url( '/assets/js/jquery.timeago.min.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
			wp_enqueue_script( 'spcf-matrial-materialize', plugins_url( '/assets/js/materialize.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
			wp_enqueue_script( 'spcf-matrial-init', plugins_url( '/assets/js/init.js', dirname(__FILE__) ), array( 'jquery' ), '4.1.1', true );
		}
	
	
	$form_field=json_decode($post_content,true);
	//print_r($form_field);
	echo '<div class="spcf-form-content">';
	echo '<div id="spcf-erroe-block"></div>';
	
	
	global $thanku;
	if(isset($thanku))
		echo "<div class='alert alert-success'>".$thanku."</div>";
	
	echo "<form name='spcf-form' method='post' id='spcf-form'  enctype='multipart/form-data'>";
	echo '<input type="hidden" name="form_id" value="'.$id.'" id="form_id">';
	echo '<input type="hidden" name="spcf_form_submit" value="yes">';
	//echo wp_get_referer() ;
	if(is_array($form_field))
	{
		$i =0;
	foreach ( $form_field['fields'] as $field ) {
						$frmbld_required_class = '';
							if ( $field['required'] === true ) {
								$required = '<span class="spcf_required">' . __('*', 'wcwm') . '</span>';
								//echo '<input type="hidden" name="custom_required_'.$i.'" value="1" />';
								
								$frmbld_required_class = 'class="validate[required]"';
								
							}
							else $required = '';
					?>
<?php
							switch ($field['field_type']) :
							case 'text' :
							 	display_textbox($field,$required,$spcf_design_effact);
								$i++;
								break;
							case 'dropdown' :
								display_dropdown($field,$required,$spcf_design_effact);
								$i++;
								break;
							
							case 'checkboxes' :
								display_checkbox($field,$required);
								$i++;
								break;
							case 'radio' :
								display_radio($field,$required);
								$i++;
								break;
							case 'file' :
								display_file($field,$required);
								$i++;
								break;
							case 'date' :
								display_date($field,$required,$spcf_design_effact);								
								$i++;
								break;
							case 'number' :
								display_number($field,$required,$spcf_design_effact);								
								$i++;
								break;
							case 'website' :
								display_website($field,$required,$spcf_design_effact);								
								$i++;
								break;
							case 'email' :
								display_email($field,$required,$spcf_design_effact);								
								$i++;
								break;
							case 'submit' :
								display_submit($field,$spcf_design_effact);								
								$i++;
								break;
							case 'captcha' :
								display_captcha($field,$spcf_design_effact);								
								$i++;
								break;
							case 'textarea' :
								display_textarea($field,$required,$spcf_design_effact);
								$i++;
								break;
							default :
								break;
							endswitch;
						?>
<?php
					
					} 
	}//is array end
	else
	{ echo "Not generate form some issue";}
	//echo "<input type='submit' value='Submit'>";
	echo "</form>";
	echo '</div>'; 
	}
	else
		echo "Spicy Form Not available.";
 $output = ob_get_clean();
 return $output;
		
}
add_shortcode( 'spcf', 'spcf_shortcode_func' );


?>