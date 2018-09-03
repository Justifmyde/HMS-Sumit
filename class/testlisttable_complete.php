<?php

require_once(ABSPATH . 'wp-admin/includes/template.php' );

if ( ! class_exists( 'WP_List_Table' ) )

	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );



class Treatment_List_Table extends WP_List_Table {





function get_columns(){

  $columns = array(

  	'cb'        => '<input type="checkbox" />',

	'title' => __('Title','spicy-form'),
	
	'price' => __('Type','spicy-form'),	 
	 
	  'Action'    => __('Response List','spicy-form')

);

  return $columns;

}



function get_sortable_columns() {

  $sortable_columns = array(

    'title'  => array('title',false),
	
	'type'   => array('type',false),

    'shortcode'   => array('shortcode',false),

	'date'   => array('date',true)

  );

  return $sortable_columns;

}

function get_bulk_actions() {

  $actions = array(

    'delete'    => __('Delete','spicy-form')

  );

  return $actions;

}

function process_bulk_action() {   

	 if(isset($_REQUEST['id']) )  

    $entry_id = ( is_array( $_REQUEST['id'] ) ) ? $_REQUEST['id'] : array( $_REQUEST['id'] );

	

    if ( 'delete' === $this->current_action()) {

        global $wpdb;

		//if(!empty($entry_id))

		

        foreach ( $entry_id as $id ) {

            $id = absint( $id );			

			$table_name = $wpdb->prefix.'posts';

           $wpdb->query( "DELETE FROM $table_name WHERE id = $id" );

		

        }

		

    }

}

function column_cb($item) {

        return sprintf(

            '<input type="checkbox" name="id[]" value="%s" />', $item->ID

        );    

    }

/*function usort_reorder( $a, $b ) {

  // If no sort, default to title

  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'title';

  // If no order, default to asc

  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';

  // Determine sort order

  $result = strcmp( $a[$orderby], $b[$orderby] );

  // Send final sort direction to usort

  return ( $order === 'asc' ) ? $result : -$result;

}*/



function prepare_items() {

  $columns = $this->get_columns();

  $hidden = array();

  //$sortable = array();

  $this->process_bulk_action();

  $sortable = $this->get_sortable_columns();

 

  $this->_column_headers = array($columns, $hidden, $sortable);

  $current_screen = get_current_screen();

		$per_page = 10;



		$this->_column_headers = $this->get_column_info();



		$args = array(

			'posts_per_page' => $per_page,

			'orderby' => 'title',

			'order' => 'ASC',

			'offset' => ( $this->get_pagenum() - 1 ) * $per_page );



		if ( ! empty( $_REQUEST['s'] ) )

			$args['s'] = $_REQUEST['s'];



		if ( ! empty( $_REQUEST['orderby'] ) ) {

			if ( 'title' == $_REQUEST['orderby'] )

				$args['orderby'] = 'title';

			elseif ( 'author' == $_REQUEST['orderby'] )

				$args['orderby'] = 'author';

			elseif ( 'date' == $_REQUEST['orderby'] )

				$args['orderby'] = 'date';

		}



		if ( ! empty( $_REQUEST['order'] ) ) {

			if ( 'asc' == strtolower( $_REQUEST['order'] ) )

				$args['order'] = 'ASC';

			elseif ( 'desc' == strtolower( $_REQUEST['order'] ) )

				$args['order'] = 'DESC';

		}

		

		$this->items = SPCF_ContactForm::find( $args );

		

		$total_items_count =array(

			'post_status' => 'any',

			'posts_per_page' => -1,

			'offset' => 0,

			'orderby' => 'ID',

			'order' => 'ASC' );

		if ( ! empty( $_REQUEST['s'] ) )

			$total_items_count['s'] = $_REQUEST['s'];



		if ( ! empty( $_REQUEST['orderby'] ) ) {

			if ( 'title' == $_REQUEST['orderby'] )

				$total_items_count['orderby'] = 'title';

			elseif ( 'author' == $_REQUEST['orderby'] )

				$total_items_count['orderby'] = 'author';

			elseif ( 'date' == $_REQUEST['orderby'] )

				$total_items_count['orderby'] = 'date';

		}



		if ( ! empty( $_REQUEST['order'] ) ) {

			if ( 'asc' == strtolower( $_REQUEST['order'] ) )

				$total_items_count['order'] = 'ASC';

			elseif ( 'desc' == strtolower( $_REQUEST['order'] ) )

				$total_items_count['order'] = 'DESC';

		}

		$total_items = count(SPCF_ContactForm::item_count( $total_items_count ));

		$this->set_pagination_args( array(

    'total_items' =>$total_items,                  //WE have to calculate the total number of items

    'per_page'    => $per_page                     //WE have to determine how many items to show on a page

  ) );

	

		//print_r($this->items);

 // $this->items = $this->example_data;;

}

function column_default( $item, $column_name ) {

	//echo $column_name;

  switch( $column_name ) { 

    case 'title':   

		return $item->post_title;
		
	case 'type':   

		return $this->get_post_type_name($item->ID);

	case 'shortcode':

	 	 return "[spcf id=".$item->ID."]";

	case 'date':

		return $item->post_date;
	case 'link':
		return '<a href="' . esc_url( menu_page_url( 'spcf-response-list', false ) ) . '&form_id='.$item->ID.'" class="add-new-h2">' . esc_html( __( 'View Response', 'spicy-form' ) ) . '</a>';
	
	 

   // default:

    // return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes

  }

}	
function get_post_type_name($id)
{
	if( get_post_type($id) == 'spcf_contact_form')
		return 'Form';
	if( get_post_type($id) == 'spcf_serve_form')
		return 'Survey Form';
	if( get_post_type($id) == 'spcf_poll_form')
		return 'Poll';
}
function column_title($item) {

	

  $actions = array(
  

            'edit'      => sprintf('<a href="?page=%s&action=%s&post=%s">'.__('Edit','spicy-form').'</a>',$_REQUEST['page'],'edit',$item->ID),

            'delete'    => sprintf('<a href="?page=%s&action=%s&post=%s">'.__('Delete','spicy-form').'</a>',$_REQUEST['page'],'delete',$item->ID),

        );



  return sprintf('%1$s %2$s', $item->post_title, $this->row_actions($actions) );

}



}

	$myListTable=new SPCF_Form_List_Table();

	//$myListTable->search_box('search', 'search_id');

?>