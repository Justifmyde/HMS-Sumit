<?php 
require_once HMS_PLUGIN_DIR. '/hmgt_function.php';
require_once HMS_PLUGIN_DIR. '/class/userdata.php';
require_once HMS_PLUGIN_DIR. '/class/medicine.php';
require_once HMS_PLUGIN_DIR. '/class/treatment.php';
require_once HMS_PLUGIN_DIR. '/class/bedmanage.php';
require_once HMS_PLUGIN_DIR. '/class/operation.php';
require_once HMS_PLUGIN_DIR. '/class/perscription.php';
require_once HMS_PLUGIN_DIR. '/class/ambulance.php';
require_once HMS_PLUGIN_DIR. '/class/bloodbank.php';
require_once HMS_PLUGIN_DIR. '/class/dignosis.php';
require_once HMS_PLUGIN_DIR. '/class/message.php';
require_once HMS_PLUGIN_DIR. '/class/invoice.php';
require_once HMS_PLUGIN_DIR. '/class/appointment.php';
require_once HMS_PLUGIN_DIR. '/class/report.php';
require_once HMS_PLUGIN_DIR. '/class/hospital-management.php';
//require_once HMS_PLUGIN_DIR. '/class/contact-form.php';
//require_once HMS_PLUGIN_DIR. '/class/testlisttable_complete.php';

add_action( 'admin_bar_menu', 'hmgt_hospital_dashboard_link', 999 );

add_action( 'admin_head', 'hmgt_admin_css' );

function hmgt_admin_css(){
	$background = "dedede";?>
     <style>
      a.toplevel_page_hospital:hover,  a.toplevel_page_hospital:focus,.toplevel_page_hospital.opensub a.wp-has-submenu{
  background: url("<?php echo HMS_PLUGIN_URL;?>/assets/images/hospital-1.png") no-repeat scroll 8px 9px rgba(0, 0, 0, 0) !important;
  
}
.toplevel_page_hospital:hover .wp-menu-image.dashicons-before img {
  display: none;
}

.toplevel_page_hospital:hover .wp-menu-image.dashicons-before {
  min-width: 23px !important;
}
    
     </style>
<?php
}

function hmgt_hospital_dashboard_link( $wp_admin_bar ) {
	$args = array(
			'id'    => 'hospital-dashboard',
			'title' => __('Hospital Dashboard','hospital_mgt'),
			'href'  => home_url().'?dashboard=user',
			'meta'  => array( 'class' => 'hmgt-hospital-dashboard' )
	);
	$wp_admin_bar->add_node( $args );
}

if ( is_admin() ){
	require_once HMS_PLUGIN_DIR. '/admin/admin.php';
	function hospital_install()
	{
			
			add_role('doctor', __( 'Doctor' ,'hospital_mgt'),array( 'read' => true, 'level_0' => true ));
			add_role('nurse', __( 'Nurse' ,'hospital_mgt'),array( 'read' => true, 'level_0' => true ));
			add_role('pharmacist', __( 'Pharmacist' ,'hospital_mgt'),array( 'read' => true, 'level_0' => true ));
			add_role('laboratorist', __( 'Laboratory Staff' ,'hospital_mgt'),array( 'read' => true, 'level_0' => true ));
			add_role('accountant', __( 'Accountant' ,'hospital_mgt'),array( 'read' => true, 'level_0' => true ));
			add_role('patient', __( 'Patient' ,'hospital_mgt'),array( 'read' => true, 'level_0' => true ));
			add_role('receptionist', __( 'Support Staff' ,'hospital_mgt'),array( 'read' => true, 'level_0' => true ));
			hmgt_register_post();
			hmgt_install_tables();			
	}
	register_activation_hook(HMS_PLUGIN_BASENAME, 'hospital_install' );

	function hmgt_option(){
		$options=array("hmgt_hospital_name"=> __( 'Hospital Management System' ,'hospital-mgt'),
					"hmgt_staring_year"=>"2015",
					"hmgt_hospital_address"=>"",
					"hmgt_contact_number"=>"9999999999",
					"hmgt_contry"=>"India",
					"hmgt_email"=>get_option('admin_email'),
					"hmgt_hospital_logo"=>plugins_url( 'hospital-management/assets/images/Thumbnail-img.png' ),
					"hmgt_hospital_background_image"=>plugins_url('hospital-management/assets/images/hospital_background.png' ),
					"hmgt_doctor_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/doctor.png' ),
					"hmgt_patient_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/patient.png' ),
					"hmgt_guardian_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/patient.png' ),
					"hmgt_nurse_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/nurse.png' ),
					"hmgt_support_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/supportstaff.png' ),
					"hmgt_pharmacist_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/pharmacist.png' ),
					"hmgt_laboratorist_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/laboratorystaff.png' ),
					"hmgt_accountant_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/accountant.png' ),
					"hmgt_driver_thumb"=>plugins_url( 'hospital-management/assets/images/useriamge/driver.jpg' ),
				    "hmgt_viewall_patient"=>'yes',
				    "hmgt_enable_change_profile_picture"=>'yes',
				    "hmgt_enable_hospitalname_in_priscription"=>'yes',
					"hmgt_sms_service"=>"",
					"hmgt_sms_service_enable"=> 0,					
					"hmgt_clickatell_sms_service"=>array(),
					"hmgt_twillo_sms_service"=>array(),
					
		);
		return $options;
	}
	add_action('admin_init','hmgt_general_setting');	
	function hmgt_general_setting()
	{
		$options=hmgt_option();
		foreach($options as $key=>$val)
		{
			add_option($key,$val); 
			
		}
	}
	
function hmgt_call_script_page()
{
	$page_array = array('hospital','hmgt_doctor','hmgt_patient','hmgt_outpatient','hmgt_nurse','hmgt_receptionist','hmgt_pharmacist','hmgt_laboratorist','hmgt_accountant',
					'hmgt_medicine','hmgt_treatment','hmgt_prescription','hmgt_operation','hmgt_diagnosis','hmgt_bloodbank','hmgt_bedmanage','hmgt_bedallotment','hmgt_appointment',
					'hmgt_invoice','hmgt_event','hmgt_message','hmgt_ambulance','hmgt_gnrl_settings','hmgt_report','hmgt_sms_setting','hmgt_audit_log','hmgt_access_right');
	return  $page_array;
}
function hmgt_change_adminbar_css($hook) {	
				$current_page = $_REQUEST['page'];
				$page_array = hmgt_call_script_page();
				if(in_array($current_page,$page_array))
		{
			
				wp_register_script( 'jquery-1.8.2', plugins_url( '/assets/js/jquery-1.11.1.min.js', __FILE__), array( 'jquery' ) );
			 	wp_enqueue_script( 'jquery-1.8.2' );		
				wp_enqueue_style( 'accordian-jquery-ui-css', plugins_url( '/assets/accordian/jquery-ui.css', __FILE__) );		
				wp_enqueue_script('accordian-jquery-ui', plugins_url( '/assets/accordian/jquery-ui.js',__FILE__ ));
			
				
				wp_enqueue_style( 'sweetalert', plugins_url( '/assets/css/sweetalert.css', __FILE__) );
				wp_enqueue_style( 'example', plugins_url( '/assets/css/example.css', __FILE__) );
				
				wp_enqueue_style( 'hmgt-calender-css', plugins_url( '/assets/css/fullcalendar.css', __FILE__) );
				wp_enqueue_style( 'hmgt-datatable-css', plugins_url( '/assets/css/dataTables.css', __FILE__) );
				wp_enqueue_style( 'hmgt-admin-style-css', plugins_url( '/admin/css/admin-style.css', __FILE__) );
				wp_enqueue_style( 'hmgt-style-css', plugins_url( '/assets/css/style.css', __FILE__) );
				wp_enqueue_style( 'hmgt-popup-css', plugins_url( '/assets/css/popup.css', __FILE__) );
				wp_enqueue_style( 'hmgt-custom-css', plugins_url( '/assets/css/custom.css', __FILE__) );
				
				
				
				
				
				wp_enqueue_script('sweetalert-dev', plugins_url( '/assets/js/sweetalert-dev.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
				wp_enqueue_script('hmgt-calender_moment', plugins_url( '/assets/js/moment.min.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
				wp_enqueue_script('hmgt-calender', plugins_url( '/assets/js/fullcalendar.min.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
				wp_enqueue_script('hmgt-datatable', plugins_url( '/assets/js/jquery.dataTables.min.js',__FILE__ ), array( 'jquery' ), '4.1.1', true);
				wp_enqueue_script('hmgt-datatable-tools', plugins_url( '/assets/js/dataTables.tableTools.min.js',__FILE__ ), array( 'jquery' ), '4.1.1', true);
				wp_enqueue_script('hmgt-datatable-editor', plugins_url( '/assets/js/dataTables.editor.min.js',__FILE__ ), array( 'jquery' ), '4.1.1', true);	
				wp_enqueue_script('hmgt-customjs', plugins_url( '/assets/js/hmgt_custom.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
				wp_enqueue_script('hmgt-timeago-js', plugins_url( '/assets/js/jquery.timeago.js', __FILE__ ) );
			
			
				wp_enqueue_script('hmgt-popup', plugins_url( '/assets/js/popup.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
				wp_localize_script( 'hmgt-popup', 'hmgt', array( 'ajax' => admin_url( 'admin-ajax.php' ) ) );
			 	wp_enqueue_script('jquery');
			 	wp_enqueue_media();
		       	wp_enqueue_script('thickbox');
		       	wp_enqueue_style('thickbox');
		 
		      
			 	wp_enqueue_script('hmgt-image-upload', plugins_url( '/assets/js/image-upload.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
			 
			
				wp_enqueue_style( 'hmgt-bootstrap-css', plugins_url( '/assets/css/bootstrap.min.css', __FILE__) );
				wp_enqueue_style( 'hmgt-bootstrap-multiselect-css', plugins_url( '/assets/css/bootstrap-multiselect.css', __FILE__) );
				wp_enqueue_style( 'hmgt-bootstrap-timepicker-css', plugins_url( '/assets/css/bootstrap-timepicker.min.css', __FILE__) );
			 	wp_enqueue_style( 'hmgt-font-awesome-css', plugins_url( '/assets/css/font-awesome.min.css', __FILE__) );
			 	wp_enqueue_style( 'hmgt-white-css', plugins_url( '/assets/css/white.css', __FILE__) );
			 	wp_enqueue_style( 'hmgt-hospitalmgt-min-css', plugins_url( '/assets/css/hospitalmgt.min.css', __FILE__) );
				 if (is_rtl())
				 {
					wp_enqueue_style( 'hmgt-bootstrap-rtl-css', plugins_url( '/assets/css/bootstrap-rtl.min.css', __FILE__) );
					
				 }
				 wp_enqueue_style( 'hmgt-hospitalmgt-responsive-css', plugins_url( '/assets/css/hospital-responsive.css', __FILE__) );
			  
			 	wp_enqueue_script('hmgt-bootstrap-js', plugins_url( '/assets/js/bootstrap.min.js', __FILE__ ) );
			 	wp_enqueue_script('hmgt-bootstrap-multiselect-js', plugins_url( '/assets/js/bootstrap-multiselect.js', __FILE__ ) );
			 	wp_enqueue_script('hmgt-bootstrap-timepicker-js', plugins_url( '/assets/js/bootstrap-timepicker.min.js', __FILE__ ) );
			 	wp_enqueue_script('hmgt-hospital-js', plugins_url( '/assets/js/hospitaljs.js', __FILE__ ) );
			 	/* $locale_code = strtolower(str_replace('_','-', get_locale()));
		 $file_short = HMS_PLUGIN_URL.'/assets/js/lang/fr.js';
		  $file_short_file = HMS_PLUGIN_DIR.'/assets/js/lang/fr.js';
		  //$file_short = HMS_PLUGIN_URL.'/assets/js/lang/'.substr ( $locale_code, 0, 2 ).'.js';
		    //$file_long = HMS_PLUGIN_URL.'/assets/js/lang/'.$locale_code.'.js';
		   if( file_exists($file_short_file) ){
			   wp_enqueue_script('hmgt-hospital-moment-js', plugins_url( '/assets/js/moment.min.js', __FILE__ ) );
		  wp_enqueue_script('hmgt-calendar-lang-js',$file_short );
		   }
		   elseif(file_exists($file_long) )
		   {wp_enqueue_script('hmgt-calendar-lang-js',$file_long );}*/
			 	//Validation style And Script
			 	
			 	//validation lib
		$lancode=get_locale();
		$code=substr($lancode,0,2);		
		wp_enqueue_style( 'wcwm-validate-css', plugins_url( '/lib/validationEngine/css/validationEngine.jquery.css', __FILE__) );	
		
		
		wp_register_script( 'jquery-validationEngine-'.$code, plugins_url( '/lib/validationEngine/js/languages/jquery.validationEngine-'.$code.'.js', __FILE__), array( 'jquery' ) );
		
		wp_enqueue_script( 'jquery-validationEngine-'.$code );
		
		wp_register_script( 'jquery-validationEngine', plugins_url( '/lib/validationEngine/js/jquery.validationEngine.js', __FILE__), array( 'jquery' ) );
		
		wp_enqueue_script( 'jquery-validationEngine' );
				
				
			 	
			 
			 if(isset($_REQUEST['page']) && ($_REQUEST['page'] == 'report' || $_REQUEST['page'] == 'hospital'))
			 {
			 wp_enqueue_script('hmgt-customjs', plugins_url( '/assets/js/Chart.min.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
			 }
		}
		
	}
	if(isset($_REQUEST['page']))
	add_action( 'admin_enqueue_scripts', 'hmgt_change_adminbar_css' );
}
add_action('wp_footer', 'hmgt_footer_js');
function hmgt_footer_js(){
		?>
		<script type='text/javascript'>
		<?php 
		 // include('includes/js/inline.js');
		  $locale_code = strtolower(str_replace('_','-', get_locale()));
		 
		  $file_short = plugins_url().'/assets/js/lang/'.substr ( $locale_code, 0, 2 ).'.js';
		 
		   include_once($file_short);
		  
		?>
		</script>
		<?php
	}

function hmgt_install_login_page() {

	if ( !get_option('hmgt_login_page') ) {
		

		$curr_page = array(
				'post_title' => __('Hospital Management Login Page', 'hospital_mgt'),
				'post_content' => '[hmgt_login]',
				'post_status' => 'publish',
				'post_type' => 'page',
				'comment_status' => 'closed',
				'ping_status' => 'closed',
				'post_category' => array(1),
				'post_parent' => 0 );
		

		$curr_created = wp_insert_post( $curr_page );

		update_option( 'hmgt_login_page', $curr_created );
		
		
	}
}
function hmgt_install_patient_registration_page() {
	

	if ( !get_option('hmgt_patient_registration_page') ) {
		

		$curr_page = array(
				'post_title' => __('Hospital Management Patient Registration Page', 'hospital_mgt'),
				'post_content' => '[hmgt_patient_registration]',
				'post_status' => 'publish',
				'post_type' => 'page',
				'comment_status' => 'closed',
				'ping_status' => 'closed',
				'post_category' => array(1),
				'post_parent' => 0 );
		

		$curr_created = wp_insert_post( $curr_page );

		update_option( 'hmgt_patient_registration_page', $curr_created );
		
		
	}
}
function hmgt_user_dashboard()
{
	
	if(isset($_REQUEST['dashboard']))
	{
		
		require_once HMS_PLUGIN_DIR. '/fronted_template.php';
		exit;
	}
	
}

function hmgt_remove_all_theme_styles() {
	global $wp_styles;
	$wp_styles->queue = array();
}
if(isset($_REQUEST['dashboard']) && $_REQUEST['dashboard'] == 'user')
{
add_action('wp_print_styles', 'hmgt_remove_all_theme_styles', 100);
}

function hmgt_load_script1()
{
	if(isset($_REQUEST['dashboard']) && $_REQUEST['dashboard'] == 'user')
	{
	
	
	wp_register_script('hmgt-popup-front', plugins_url( 'assets/js/popup.js', __FILE__ ), array( 'jquery' ));
	wp_enqueue_script('hmgt-popup-front');
	
	wp_localize_script( 'hmgt-popup-front', 'hmgt', array( 'ajax' => admin_url( 'admin-ajax.php' ) ) );
	 wp_enqueue_script('jquery');
	
	}

}

function hmgt_domain_load(){
	load_plugin_textdomain( 'hospital_mgt', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );
}
//Patient regitsration
function hmgt_registration_validation($patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,
		$symptoms,$diagnosis,$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar)  
{
	global $reg_errors;
	$reg_errors = new WP_Error;
	if ( empty( $patient_id )  || empty( $first_name ) || empty( $last_name ) || empty( $birth_date ) ||  
	empty( $blood_group ) ||  empty( $symptoms ) || empty( $address ) || empty( $city_name ) || empty( $zip_code ) || 
	empty( $email ) || empty( $username ) || 	empty( $password )	) 
	{
    $reg_errors->add('field', 'Required form field is missing');
	}
	if ( 4 > strlen( $username ) ) {
    $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
	}
	if ( username_exists( $username ) )
		$reg_errors->add('user_name', 'Sorry, that username already exists!');
	if ( ! validate_username( $username ) ) {
    $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
	}
	
	if ( !is_email( $email ) ) {
    $reg_errors->add( 'email_invalid', 'Email is not valid' );
	}
	if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', 'Email Already in use' );
	}
	
	if ( is_wp_error( $reg_errors ) ) {
 
    foreach ( $reg_errors->get_error_messages() as $error ) {
     
        echo '<div class="student_reg_error">';
        echo '<strong>ERROR</strong> : ';
        echo '<span class="error"> '.$error . ' </span><br/>';
        echo '</div>';
         
    }
 
}	

}
function hmgt_complete_registration($patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,$symptoms,$diagnosis,
	$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar) 
	{
    global $reg_errors;
	 global $patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,$symptoms,$diagnosis,
	$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar;
	 $smgt_avatar = '';	
		
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'user_url'      =>   NULL,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        'nickname'      =>   NULL
        
        );
		$diagnosis_report = '';
		
		
		$user_object=new Hmgtuser();
		$user_id = wp_insert_user( $userdata );
		$id=0;
		$guardian_data=array('patient_id'=>$user_id,
							'doctor_id'=>$doctor,
							'symptoms'=>$symptoms,
							'inpatient_create_date'=>date("Y-m-d H:i:s"),'inpatient_create_by'=>1
					);
					$inserted=add_guardian($guardian_data,$id);
		
		if(isset($_FILES['diagnosis']) && !empty($_FILES['diagnosis']) && $_FILES['diagnosis']['size'] !=0)
		{
			if($_FILES['diagnosis']['size'] > 0){
				$diagnosis_report =load_documets($_FILES['diagnosis'],'diagnosis','report');}
	
				$user_object->upload_diagnosis_report($user_id,$diagnosis_report);
		}
		 $patient_image_url = '';
	  if($_FILES['hmgt_user_avatar']['size'] > 0)
						{
						 $patient_image=load_documets($_FILES['hmgt_user_avatar'],'hmgt_user_avatar','pimg');
						$patient_image_url=content_url().'/uploads/hospital_assets/'.$patient_image;
						}
 		$user = new WP_User($user_id);
	  $user->set_role('patient');
	
		$usermetadata=array('patient_id' => $patient_id,						
						'middle_name'=>$middle_name,
						'gender'=>$gender,
						'birth_date'=>$birth_date,
						'address'=>$address,
						'city_name'=>$city_name,
						'state_name'=>$state_name,
						'country_name'=>$country_name,
						'zip_code'=>$zip_code,						
						'phone'=>$phone,
						'mobile'=>$mobile,
						'blood_group'=>$blood_group,
						'patient_type' => $_POST['patient_type'],
						
						'hmgt_user_avatar'=>$patient_image_url);
		
		
		foreach($usermetadata as $key=>$val)
		{		
		update_user_meta( $user_id, $key,$val );	
	
		}
		$returnans=update_user_meta( $user_id, 'first_name',$first_name );
		$returnans=update_user_meta( $user_id, 'last_name',$last_name );
		$hash = md5( rand(0,1000) );
update_user_meta( $user_id, 'hmgt_hash', $hash );

$user_info = get_userdata($user_id);
$to = $user_info->user_email;           
$subject = 'Patient Verification'; 
$message = 'Hello,';
$message .= "\n\n";
$message .= 'Welcome...';
$message .= "\n\n";
$message .= 'Username: '.$username;
$message .= "\n";
$message .= 'Password: '.$password;
$message .= "\n\n";
$message .= 'Please click this url or copy this url and past into address bar to activate your account : ';
$message .= "\n";
$message .= home_url('/').'?id='.$username.'&haskey='.$hash;

wp_mail($to, $subject, $message); 
        echo 'Registration complete.Your account active after Once you confirm your email.';   
    }
}
function hmgt_registration_form($patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,$symptoms,$diagnosis,
	$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar) 
{
	$edit = 0;
	$role='patient';
	$patient_type='outpatient';
	$lastpatient_id=get_lastpatient_id($role);
				 $nodate=substr($lastpatient_id,0,-4);
				 $patientno=substr($nodate,1);
				 $patientno+=1;
				$newpatient='P'.$patientno.date("my");
    echo '
    <style>
	.patient_registraion_form {
  float: left;
  width: 100%;
}
.patient_registraion_form .form-group {
  margin-bottom: 10px;
  margin-top: 10px;
}
.patient_registraion_form .form-group .form-control {
  font-size: 16px;
}
	.patient_registraion_form .form-group,.patient_registraion_form .form-group .form-control{float:left;width:100%}
	.patient_registraion_form .form-group .require-field{color:red;}
	.patient_registraion_form select.form-control,.patient_registraion_form input[type="file"] {
  padding: 0.5278em;
   margin-bottom: 5px;
}
.patient_registraion_form  .radio-inline {
    float: left;
    margin-bottom: 10px;
    margin-top: 10px;
	 margin-right: 15px;
}
.patient_registraion_form  .radio-inline .tog {
    margin-right: 5px;
}
.patient_registraion_form .col-sm-2.control-label {
  line-height: 48px;
  text-align: right;
}
	.patient_registraion_form .form-group .col-sm-2 {width: 24.667%;}
	.patient_registraion_form .form-group .col-sm-8 {     width: 66.66666667%;}
	.patient_registraion_form .form-group .col-sm-7{  width: 53.33333333%;}
	.patient_registraion_form .form-group .col-sm-1{  width: 13.33333333%;}
	.patient_registraion_form .form-group .col-sm-8, .patient_registraion_form .form-group .col-sm-2,.patient_registraion_form .form-group .col-sm-7,.patient_registraion_form .form-group .col-sm-1{      
	padding-left: 15px;
	 padding-right: 15px;
	float:left;}
	.patient_registraion_form .form-group .col-sm-8, .patient_registraion_form .form-group .col-sm-2,.patient_registraion_form .form-group .col-sm-7{
		position: relative;
    min-height: 1px;   
	}

    div {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
	.patient_registraion_form .col-sm-offset-2.col-sm-8 {
  float: left;
  margin-left: 35%;
  margin-top: 15px;
}
.patient_registraion_form .form-control {
  line-height: 30px;
}
	.student_reg_error .error{color:red;}
    </style>
    ';
 
    echo '
	<div class="patient_registraion_form">
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" enctype="multipart/form-data">';
	wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	?>
	<script type="text/javascript">
jQuery(document).ready(function() {
	
	jQuery('#birth_date').datepicker({
		  changeMonth: true,
	        changeYear: true,
	        yearRange:'-65:+0',
	        onChangeMonthYear: function(year, month, inst) {
	           jQuery(this).val(month + "/" + year);
	        }
                    
                }); 
} );
</script>
	  <?php $action = isset($_REQUEST['action'])?$_REQUEST['action']:'insert';?>
		<input type="hidden" name="action" value="<?php echo $action;?>">
		<input type="hidden" name="role" value="<?php echo $role;?>"  />
		<input type="hidden" name="patient_type" value="<?php echo $patient_type;?>"  />
		
		<input type="hidden" name="user_id" value="<?php if(isset($_REQUEST['outpatient_id'])) echo $_REQUEST['outpatient_id'];?>"  />
		<input id="patient_id" type="hidden" 
				value="<?php  echo $newpatient;?>" name="patient_id">
		
		<div class="form-group">
			<label class="col-sm-2 control-label" for="first_name"><?php _e('First Name','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="first_name" class="form-control validate[required,custom[onlyLetterSp]] text-input" type="text" value="<?php if($edit){ echo $user_info->first_name;}elseif(isset($_POST['first_name'])) echo $_POST['first_name'];?>" name="first_name">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="middle_name"><?php _e('Middle Name','hospital_mgt');?></label>
			<div class="col-sm-8">
				<input id="middle_name" class="form-control " type="text"  value="<?php if($edit){ echo $user_info->middle_name;}elseif(isset($_POST['middle_name'])) echo $_POST['middle_name'];?>" name="middle_name">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="last_name"><?php _e('Last Name','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="last_name" class="form-control validate[required,custom[onlyLetterSp]] text-input" type="text"  value="<?php if($edit){ echo $user_info->last_name;}elseif(isset($_POST['last_name'])) echo $_POST['last_name'];?>" name="last_name">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label" for="gender"><?php _e('Gender','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
			<?php $genderval = "male"; if($edit){ $genderval=$user_info->gender; }elseif(isset($_POST['gender'])) {$genderval=$_POST['gender'];}?>
				<label class="radio-inline">
			     <input type="radio" value="male" class="tog validate[required]" name="gender"  <?php  checked( 'male', $genderval);  ?>/><?php _e('Male','hospital_mgt');?>
			    </label>
			    <label class="radio-inline">
			      <input type="radio" value="female" class="tog validate[required]" name="gender"  <?php  checked( 'female', $genderval);  ?>/><?php _e('Female','hospital_mgt');?> 
			    </label>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label" for="birth_date"><?php _e('Date of birth','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="birth_date" class="form-control validate[required]" type="text"  name="birth_date" 
				value="<?php if($edit){ echo $user_info->birth_date;}elseif(isset($_POST['birth_date'])) echo $_POST['birth_date'];?>">
			</div>
		</div>		
		<div class="form-group">
			<label class="col-sm-2 control-label" for="blood_group"><?php _e('Blood Group','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<?php if($edit){ $userblood=$user_info->blood_group; }elseif(isset($_POST['blood_group'])){$userblood=$_POST['blood_group'];}else{$userblood='';}?>
				<select id="blood_group" class="form-control validate[required]" name="blood_group">
				<option value=""><?php _e('Select Blood Group','hospital_mgt');?></option>
				<?php foreach(blood_group() as $blood){ ?>
						<option value="<?php echo $blood;?>" <?php selected($userblood,$blood);  ?>><?php echo $blood; ?> </option>
				<?php } ?>
			</select>
			</div>
		</div>
		<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit'){?>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="patient_convert"><?php  _e(' Convert into in patient','hospital_mgt');?></label>
				<div class="col-sm-8">
				<input type="checkbox"  name="patient_convert" value="inpatient">
				
				</div>
		</div>
		<?php }?>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="symptoms"><?php _e('Symptoms','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<textarea id="symptoms" class="form-control validate[required]" name="symptoms"> <?php if($edit){ echo $doctordetail['symptoms'];}elseif(isset($_POST['symptoms'])) echo $_POST['symptoms'];?></textarea>
			</div>
		</div>
		<!--<div class="form-group">
			<label class="col-sm-2 control-label" for="medicine"><?php _e('Medicine','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<textarea id="medicine" class="form-control validate[required]" name="medicine"> <?php //if($edit){ echo $user_info['medicine'];}elseif(isset($_POST['medicine'])) echo $_POST['medicine'];?></textarea>
			</div>
		</div>-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="diagnosis"><?php _e('Diagnosis Report','hospital_mgt');?></label>
			<div class="col-sm-8">
				<input type="file" class="form-control file" name="diagnosis">
			</div>			
		</div>
		<input type="hidden"  name="doctor" value="">
			
		<div class="form-group">
			<label class="col-sm-2 control-label" for="address"><?php _e('Address','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="address" class="form-control validate[required]" type="text"  name="address" 
				value="<?php if($edit){ echo $user_info->address;}elseif(isset($_POST['address'])) echo $_POST['address'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label" for="city_name"><?php _e('City','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="city_name" class="form-control validate[required]" type="text"  name="city_name" 
				value="<?php if($edit){ echo $user_info->city_name;}elseif(isset($_POST['city_name'])) echo $_POST['city_name'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="state_name"><?php _e('State','hospital_mgt');?></label>
			<div class="col-sm-8">
				<input id="state_name" class="form-control" type="text"  name="state_name" 
				value="<?php if($edit){ echo $user_info->state_name;}elseif(isset($_POST['state_name'])) echo $_POST['state_name'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="state_name"><?php _e('Country','hospital_mgt');?></label>
			<div class="col-sm-8">
				<input id="country_name" class="form-control" type="text"  name="country_name" 
				value="<?php if($edit){ echo $user_info->country_name;}elseif(isset($_POST['country_name'])) echo $_POST['country_name'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="zip_code"><?php _e('Zip Code','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="zip_code" class="form-control  validate[required,custom[onlyLetterNumber]]" type="text"  name="zip_code" 
				value="<?php if($edit){ echo $user_info->zip_code	;}elseif(isset($_POST['zip_code'])) echo $_POST['zip_code'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label " for="mobile"><?php _e('Mobile','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-1">
			
			<input type="text" readonly value="+<?php echo hmgt_get_countery_phonecode(get_option( 'hmgt_contry' ));?>"  class="form-control" name="phonecode">
			</div>
			<div class="col-sm-7">
				<input id="mobile" class="form-control validate[,custom[phone]] text-input" type="text"  name="mobile" 
				value="<?php if($edit){ echo $user_info->mobile;}elseif(isset($_POST['mobile'])) echo $_POST['mobile'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label " for="phone"><?php _e('Phone','hospital_mgt');?></label>
			<div class="col-sm-8">
				<input id="phone" class="form-control validate[,custom[phone]] text-input" type="text"  name="phone" 
				value="<?php if($edit){ echo $user_info->phone;}elseif(isset($_POST['phone'])) echo $_POST['phone'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label " for="email"><?php _e('Email','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="email" class="form-control validate[required,custom[email]] text-input" type="text"  name="email" 
				value="<?php if($edit){ echo $user_info->user_email;}elseif(isset($_POST['email'])) echo $_POST['email'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label" for="username"><?php _e('User Name','hospital_mgt');?><span class="require-field">*</span></label>
			<div class="col-sm-8">
				<input id="username" class="form-control validate[required]" type="text"  name="username" 
				value="<?php if($edit){ echo $user_info->user_login;}elseif(isset($_POST['username'])) echo $_POST['username'];?>" <?php if($edit) echo "readonly";?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password"><?php _e('Password','hospital_mgt');?><?php if(!$edit) {?><span class="require-field">*</span><?php }?></label>
			<div class="col-sm-8">
				<input id="password" class="form-control <?php if(!$edit) echo 'validate[required]';?>" type="password"  name="password" value="">
			</div>
		</div>
	
			<div class="form-group">
			<label class="col-sm-2 control-label" for="photo"><?php _e('Image','hospital_mgt');?></label>
			
				<div class="col-sm-8">
				<input type="file" class="form-control file" name="hmgt_user_avatar">
			</div>
			
			</div>	
			<div class="col-sm-offset-2 col-sm-8">
        	
        	<input type="submit" value="<?php  _e('Patient Registration','hospital_mgt'); ?>" name="registration_front_patient" class="btn btn-success"/>
        </div>
    </form>
	</div>
    <?php
}
function hmgt_patient_registration_function()
{
	global $patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,$symptoms,$diagnosis,
	$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar;
	
    if ( isset($_POST['registration_front_patient'] ) ) {
		
        hmgt_registration_validation(
		$_POST['patient_id'],
		
		$_POST['first_name'],
		$_POST['middle_name'],
		$_POST['last_name'],
		$_POST['gender'],
		$_POST['birth_date'],
		$_POST['blood_group'],
		$_POST['symptoms'],
		'diagnosis',
		$_POST['doctor'],
		$_POST['address'],
		$_POST['city_name'],
		$_POST['state_name'],
		$_POST['country_name'],
		$_POST['zip_code'],
		$_POST['mobile'],		
		$_POST['phone'],
		$_POST['email'],
        $_POST['username'],
        $_POST['password'],        
        'hmgt_user_avatar'
        
        );
         
		 
        // sanitize user form input
        global $patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,$symptoms,$diagnosis,
	$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar;
        $patient_id =    $_POST['patient_id'] ;		
		$first_name =    $_POST['first_name'] ;
		$middle_name =   $_POST['middle_name'] ;
		$last_name =  $_POST['last_name'] ;
		$gender =   $_POST['gender'] ;
		$birth_date =   $_POST['birth_date'] ;
		$blood_group =   $_POST['blood_group'] ;
		$symptoms =   $_POST['symptoms'] ;
		$diagnosis =   'diagnosis' ;
		$doctor =   $_POST['doctor'] ;
		$address =   $_POST['address'] ;
		$city_name =    $_POST['city_name'] ;
		$state_name =   $_POST['state_name'] ;
		$country_name =   $_POST['country_name'] ;
		$zip_code =   $_POST['zip_code'] ;
		$mobile =   $_POST['mobile'] ;		
		$phone =   $_POST['phone'] ;		
		$username   =    $_POST['username'] ;
        $password   =    $_POST['password'] ;
        $email      =    $_POST['email'] ;
        
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        hmgt_complete_registration(
       $patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,$symptoms,$diagnosis,
	$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar);
    }
 
    hmgt_registration_form(
      $patient_id,$first_name,$middle_name,$last_name,$gender,$birth_date,$blood_group,$symptoms,$diagnosis,
	$doctor,$address,$city_name,$state_name,$country_name,$zip_code,$mobile,$phone,$email,
	$username,$password,$hmgt_user_avatar);

}
function hmgt_activat_mail_link()
{

	if(isset($_REQUEST['haskey']) && isset($_REQUEST['id']))
	{		
	
	global $wpdb;
		$table_users=$wpdb->prefix.'users';
		$user = get_userdatabylogin($_REQUEST['id']);
   $user_id =  $user->ID; // prints the id of the user
		if( get_user_meta($user_id, 'hmgt_hash', true))
		{
		
			if(get_user_meta($user_id, 'hmgt_hash', true) == $_REQUEST['haskey'])
			{
				delete_user_meta($user_id, 'hmgt_hash');
				$curr_args = array(
			'page_id' => get_option('hmgt_login_page'),
			'smgt_activate' => 1
	);
	//print_r($curr_args);
	$referrer_faild = add_query_arg( $curr_args, get_permalink( get_option('hmgt_login_page') ) );
				wp_redirect($referrer_faild);
				exit;
			}
			else
			{
				$curr_args = array(
			'page_id' => get_option('hmgt_login_page'),
			'smgt_activate' => 2
	);
	//print_r($curr_args);
	$referrer_faild = add_query_arg( $curr_args, get_permalink( get_option('hmgt_login_page') ) );
				wp_redirect($referrer_faild);
				exit;
			}
			
			
		}
		wp_redirect(home_url('/'));
				exit;
		
			
		
	}
}

add_filter('wp_authenticate_user', function($user) {
  
	$havemeta = get_user_meta($user->ID, 'hmgt_hash', true);
	if($havemeta)
	{
		global $reg_errors;
	$reg_errors = new WP_Error;
	return $reg_errors->add( 'not_active', 'Please active account' );
	}
	return $user;
		
	
}, 10, 2);
add_action( 'plugins_loaded', 'hmgt_domain_load' );
add_action('wp_enqueue_scripts','hmgt_load_script1');
add_action('init','hmgt_install_login_page');
add_action('init','hmgt_install_patient_registration_page');
add_action('init','hmgt_activat_mail_link');
add_action('wp_head','hmgt_user_dashboard');
add_shortcode( 'hmgt_login','hmgt_login_link' );
add_action('init','hmgt_output_ob_start');
add_shortcode( 'hmgt_patient_registration', 'hmgt_patient_registration_shortcode' );
// The callback function that will replace [book]
function hmgt_patient_registration_shortcode() {
    ob_start();
    hmgt_patient_registration_function();
    return ob_get_clean();
}
function hmgt_output_ob_start()
{
	if (!file_exists(HMS_LOG_DIR))
		mkdir(HMS_LOG_DIR, 0777, true);
	$file_name = 'hmgt_log.txt';
if (!file_exists(HMS_LOG_DIR.$file_name)) {
			$fh = fopen(HMS_LOG_DIR.$file_name, 'w');
			//echo HMS_LOG_DIR;
			
		}
		
	ob_start();
}
//Register Post Type
function hmgt_register_post()
{
	register_post_type( 'hmgt_event', array(

			'labels' => array(

					'name' => __( 'Event', 'hospital_mgt' ),

					'singular_name' => 'hmgt_event'),

			'rewrite' => false,

			'query_var' => false ) );
	register_post_type( 'hmgt_notice', array(
	
			'labels' => array(
	
					'name' => __( 'Notice', 'hospital_mgt' ),
	
					'singular_name' => 'hmgt_notice'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	register_post_type( 'bedtype_category', array(
	
			'labels' => array(
	
					'name' => __( 'Bed Category', 'hospital_mgt' ),
	
					'singular_name' => 'bedtype_category'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	register_post_type( 'department', array(
	
			'labels' => array(
	
					'name' => __( 'Department', 'hospital_mgt' ),
	
					'singular_name' => 'department'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	
	register_post_type( 'hmgt_message', array(
	
			'labels' => array(
	
					'name' => __( 'Message', 'hospital_mgt' ),
	
					'singular_name' => 'hmgt_message'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	
	register_post_type( 'medicine_category', array(
	
			'labels' => array(
	
					'name' => __( 'Medicine Category', 'hospital_mgt' ),
	
					'singular_name' => 'medicine_category'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	
	register_post_type( 'nurse_notes', array(
	
			'labels' => array(
	
					'name' => __( 'Nurse Notes', 'hospital_mgt' ),
	
					'singular_name' => 'nurse_notes'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	
	register_post_type( 'operation_category', array(
	
			'labels' => array(
	
					'name' => __( 'Operation Category', 'hospital_mgt' ),
	
					'singular_name' => 'operation_category'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	
	register_post_type( 'report_type_category', array(
	
			'labels' => array(
	
					'name' => __( 'Report Type', 'hospital_mgt' ),
	
					'singular_name' => 'report_type_category'),
	
			'rewrite' => false,
	
			'query_var' => false ) );
	
	register_post_type( 'specialization', array(
	
			'labels' => array(
	
					'name' => __( 'Spacialization', 'hospital_mgt' ),
	
					'singular_name' => 'specialization'),
	
			'rewrite' => false,
	
			'query_var' => false ) );

}

//Inatall Table
function hmgt_install_tables()
{
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	global $wpdb;
	$table_hmgt_admit_reason = $wpdb->prefix . 'hmgt_admit_reason';

	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_admit_reason." (
			 `reason_is` int(11) NOT NULL AUTO_INCREMENT,
			  `admit_reason` varchar(100) NOT NULL,
			  `create_date` date NOT NULL,
			  `create_by` int(11) NOT NULL,
			  PRIMARY KEY (`reason_is`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_ambulance = $wpdb->prefix . 'hmgt_ambulance';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_ambulance." (
			 `amb_id` int(11) NOT NULL AUTO_INCREMENT,
			  `ambulance_id` varchar(30) NOT NULL,
			  `registerd_no` varchar(25) NOT NULL,
			  `driver_name` varchar(50) NOT NULL,
			  `driver_address` varchar(300) NOT NULL,
			  `driver_phoneno` varchar(20) NOT NULL,
			  `charge` int(11) NOT NULL,
			  `description` text NOT NULL,
			  `driver_image` varchar(200) NOT NULL,
			  `amb_created_date` date NOT NULL,
			  `amb_createdby` int(11) NOT NULL,
			  PRIMARY KEY (`amb_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_ambulance_req = $wpdb->prefix . 'hmgt_ambulance_req';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_ambulance_req." (
			`amb_req_id` int(11) NOT NULL AUTO_INCREMENT,
			  `ambulance_id` int(11) NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `address` varchar(1000) NOT NULL,
			  `charge` int(11) NOT NULL,
			  `request_date` date NOT NULL,
			  `request_time` time NOT NULL,
			  `dispatch_time` time NOT NULL,
			  `amb_req_create_date` date NOT NULL,
			  `amb_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`amb_req_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_appointment = $wpdb->prefix . 'hmgt_appointment';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_appointment." (
			`appointment_id` int(11) NOT NULL AUTO_INCREMENT,
			  `appointment_date` date NOT NULL,
			  `appointment_time` time NOT NULL,
			  `appointment_time_string` varchar(50) NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `doctor_id` int(11) NOT NULL,
			  `appointment_status` int(11) NOT NULL,
			  `appoint_create_date` date NOT NULL,
			  `appoint_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`appointment_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_assign_type = $wpdb->prefix . 'hmgt_assign_type';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_assign_type." (
			`assign_id` int(11) NOT NULL AUTO_INCREMENT,
			  `child_id` int(11) NOT NULL,
			  `parent_id` int(11) NOT NULL,
			  `assign_type` varchar(30) NOT NULL,
			  `assign_date` date NOT NULL,
			  `assign_by` int(11) NOT NULL,
			  PRIMARY KEY (`assign_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_bed = $wpdb->prefix . 'hmgt_bed';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_bed." (
			`bed_id` int(11) NOT NULL AUTO_INCREMENT,
			  `bed_number` varchar(10) NOT NULL,
			  `bed_type_id` int(11) NOT NULL,
			  `bed_charges` double NOT NULL,
			  `bed_description` text NOT NULL,
			  `bed_create_date` date NOT NULL,
			  `bed_create_by` int(11) NOT NULL,
			  `status` tinyint(1) NOT NULL,
			  PRIMARY KEY (`bed_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_bed_allotment = $wpdb->prefix . 'hmgt_bed_allotment';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_bed_allotment." (
			`bed_allotment_id` int(11) NOT NULL AUTO_INCREMENT,
			  `bed_type_id` int(11) NOT NULL,
			  `bed_number` int(11) NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `patient_status` varchar(20) NOT NULL,
			  `allotment_date` date NOT NULL,
			  `discharge_time` date NOT NULL,
			  `allotment_description` text NOT NULL,
			  `created_date` int(11) NOT NULL,
			  `allotment_by` int(11) NOT NULL,
			  PRIMARY KEY (`bed_allotment_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_bld_donor = $wpdb->prefix . 'hmgt_bld_donor';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_bld_donor." (
			 `bld_donor_id` int(11) NOT NULL AUTO_INCREMENT,
			  `donor_name` varchar(100) NOT NULL,
			  `donor_gender` varchar(50) NOT NULL,
			  `donor_age` int(10) NOT NULL,
			  `donor_phone` varchar(25) NOT NULL,
			  `donor_email` varchar(50) NOT NULL,
			  `blood_group` varchar(20) NOT NULL,
			  `last_donet_date` date NOT NULL,
			  `donor_create_date` date NOT NULL,
			  `donor_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`bld_donor_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_blood_bank = $wpdb->prefix . 'hmgt_blood_bank';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_blood_bank." (
			 `blood_id` int(11) NOT NULL AUTO_INCREMENT,
			  `blood_group` varchar(10) NOT NULL,
			  `blood_status` int(10) NOT NULL,
			  `blood_create_date` date NOT NULL,
			  `blood_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`blood_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_charges = $wpdb->prefix . 'hmgt_charges';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_charges." (
			`charges_id` int(11) NOT NULL AUTO_INCREMENT,
			  `charge_label` varchar(100) NOT NULL,
			  `charge_type` varchar(100) NOT NULL,
			  `room_number` varchar(100) NOT NULL,
			  `bed_type` varchar(100) NOT NULL,
			  `charges` int(11) NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `status` tinyint(4) NOT NULL,
			  `refer_id` int(11) NOT NULL,
			  `created_date` date NOT NULL,
			  `created_by` int(11) NOT NULL,
			  PRIMARY KEY (`charges_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_diagnosis = $wpdb->prefix . 'hmgt_diagnosis';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_diagnosis." (
			`diagnosis_id` int(11) NOT NULL AUTO_INCREMENT,
			  `diagnosis_date` date NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `report_type` varchar(100) NOT NULL,
			 `report_cost` int(11) NOT NULL,
			  `attach_report` varchar(500) NOT NULL,
			  `diagno_description` text NOT NULL,
			  `diagno_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`diagnosis_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_history = $wpdb->prefix . 'hmgt_history';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_history." (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			  `patient_id` int(11) NOT NULL,
			  `status` varchar(30) NOT NULL,
			  `bed_number` varchar(20) NOT NULL,
			  `guardian_name` varchar(200) NOT NULL,
			  `history_type` varchar(30) NOT NULL,
			  `parent_id` int(11) NOT NULL,
			  `history_date` datetime NOT NULL,
			  `created_by` int(11) NOT NULL,
			  PRIMARY KEY (`id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_inpatient_guardian = $wpdb->prefix . 'hmgt_inpatient_guardian';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_inpatient_guardian." (
			`inpatient_id` int(11) NOT NULL AUTO_INCREMENT,
			  `guardian_id` varchar(20) NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `first_name` varchar(100) NOT NULL,
			  `middle_name` varchar(100) NOT NULL,
			  `last_name` varchar(100) NOT NULL,
			  `gr_gender` varchar(50) NOT NULL,
			  `gr_address` varchar(200) NOT NULL,
			  `gr_city` varchar(100) NOT NULL,
			  `gr_mobile` varchar(25) NOT NULL,
			  `gr_phone` varchar(25) NOT NULL,
			  `gr_relation` varchar(50) NOT NULL,
			  `image` varchar(200) NOT NULL,
			  `admit_date` date NOT NULL,
			  `admit_time` time NOT NULL,
			  `patient_status` varchar(100) NOT NULL,
			  `doctor_id` int(11) NOT NULL,
			  `symptoms` text NOT NULL,
			  `inpatient_create_date` date NOT NULL,
			  `inpatient_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`inpatient_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_invoice = $wpdb->prefix . 'hmgt_invoice';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_invoice." (
			`invoice_id` int(11) NOT NULL AUTO_INCREMENT,
			  `invoice_title` varchar(100) NOT NULL,
			  `invoice_number` varchar(25) NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `invoice_create_date` date NOT NULL,
			  `vat_percentage` double NOT NULL,
			  `discount` double NOT NULL,
			  `status` varchar(50) NOT NULL,
			  `invoice_amount` int(11) NOT NULL,
			  `invoice_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`invoice_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_medicine = $wpdb->prefix . 'hmgt_medicine';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_medicine." (
			`medicine_id` int(11) NOT NULL AUTO_INCREMENT,
			  `medicine_name` varchar(100) NOT NULL,
			  `med_cat_id` int(11) NOT NULL,
			  `medicine_price` int(11) NOT NULL,
			  `medicine_menufacture` varchar(250) NOT NULL,
			  `medicine_description` text NOT NULL,
			  `medicine_stock` varchar(5) NOT NULL,
			  `med_create_date` date NOT NULL,
			  `med_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`medicine_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_message = $wpdb->prefix . 'hmgt_message';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_message." (
			`message_id` int(11) NOT NULL AUTO_INCREMENT,
			  `sender` varchar(100) NOT NULL,
			  `receiver` varchar(100) NOT NULL,
			  `msg_date` date NOT NULL,
			  `msg_subject` varchar(100) NOT NULL,
			  `message_body` text NOT NULL,
			  `msg_status` tinyint(4) NOT NULL,
			  PRIMARY KEY (`message_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_ot = $wpdb->prefix . 'hmgt_ot';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_ot." (
			 `operation_id` int(11) NOT NULL AUTO_INCREMENT,
			  `operation_title` varchar(100) NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `patient_status` varchar(25) NOT NULL,
			  `bed_type_id` int(11) NOT NULL,
			  `bednumber` int(11) NOT NULL,
			  `doctor_id` int(11) NOT NULL,
			  `operation_date` date NOT NULL,
			  `operation_time` time NOT NULL,
			  `ot_description` text NOT NULL,
			  `operation_charge` int(11) NOT NULL,
			  `ot_create_date` date NOT NULL,
			  `ot_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`operation_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_priscription = $wpdb->prefix . 'hmgt_priscription';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_priscription." (
			`priscription_id` int(11) NOT NULL AUTO_INCREMENT,
			  `pris_create_date` date NOT NULL,
			  `patient_id` int(11) NOT NULL,
			  `teratment_id` int(11) NOT NULL,
			  `case_history` text NOT NULL,
			  `medication_list` text NOT NULL,
			  `treatment_note` text NOT NULL,
			  `prescription_by` int(11) NOT NULL,
			  `custom_field` varchar(6000) NOT NULL,
			  PRIMARY KEY (`priscription_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_report = $wpdb->prefix . 'hmgt_report';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_report." (
			`rid` int(11) NOT NULL AUTO_INCREMENT,
			  `patient_id` int(11) NOT NULL,
			  `report_type` varchar(10) NOT NULL,
			  `report_description` text NOT NULL,
			  `report_date` date NOT NULL,
			  `created_date` date NOT NULL,
			  `createdby` int(11) NOT NULL,
			  PRIMARY KEY (`rid`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_treatment = $wpdb->prefix . 'hmgt_treatment';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_treatment." (
			`treatment_id` int(11) NOT NULL AUTO_INCREMENT,
			  `treatment_name` varchar(100) NOT NULL,
			  `treatment_price` double NOT NULL,
			  `treat_create_Date` date NOT NULL,
			  `treat_create_by` int(11) NOT NULL,
			  PRIMARY KEY (`treatment_id`)
			) DEFAULT CHARSET=utf8";
	dbDelta($sql);
	
	$table_hmgt_income_expense = $wpdb->prefix . 'hmgt_income_expense';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_hmgt_income_expense." (
		  `income_id` int(11) NOT NULL AUTO_INCREMENT,
		  `invoice_type` varchar(25) NOT NULL,
		  `party_name` text NOT NULL,
		  `income_entry` text NOT NULL,
		  `payment_status` varchar(25) NOT NULL,
		  `income_create_by` int(11) NOT NULL,
		  `income_create_date` date NOT NULL,
		  PRIMARY KEY (`income_id`)
		  )DEFAULT CHARSET=utf8" ;
	
	dbDelta($sql);
	
	$table_hmgt_message_replies = $wpdb->prefix . 'hmgt_message_replies';
		$sql = "CREATE TABLE ".$table_hmgt_message_replies." (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `message_id` int(11) NOT NULL,
			  `sender_id` int(11) NOT NULL,
			  `receiver_id` int(11) NOT NULL,
			  `message_comment` text NOT NULL,
			  `created_date` datetime NOT NULL,
			  PRIMARY KEY (`id`)
			) DEFAULT CHARSET=utf8";
	
		$wpdb->query($sql);	
	
	
	
	$custom_field =  'custom_field';
	
	if (!in_array($custom_field, $wpdb->get_col( "DESC " . $table_hmgt_priscription, 0 ) )){  $result= $wpdb->query(
			"ALTER     TABLE $custom_field     ADD $table_hmgt_priscription     VARCHAR(6000)     NOT NULL"
	);}
	
	$new_field='medicine_expiry_date';
	$table_hmgt_medicine = $wpdb->prefix . 'hmgt_medicine';	
	if (!in_array($new_field, $wpdb->get_col( "DESC " . $table_hmgt_medicine, 0 ) )){  $result= $wpdb->query(
			"ALTER     TABLE $table_hmgt_medicine  ADD   $new_field   varchar(50)");}	

	$new_field='post_id';
	$table_hmgt_message = $wpdb->prefix . 'hmgt_message';	
	if (!in_array($new_field, $wpdb->get_col( "DESC " . $table_hmgt_message, 0 ) )){  $result= $wpdb->query(
			"ALTER     TABLE $table_hmgt_message  ADD   $new_field   int(11)");}			
}
?>