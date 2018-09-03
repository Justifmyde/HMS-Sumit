<?php 	
if(isset($_POST['save_access_right']))
{
	$access_right = array();
	$result=get_option( 'hmgt_access_right');
		
	
	//---------NEW MENU LINK START------------------
	$access_right['doctor'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/doctor.png' ),'menu_title'=>'Doctor',
	'patient' => isset($_REQUEST['patient_doctor'])?$_REQUEST['patient_doctor']:0,
	'doctor' => isset($_REQUEST['doctor_doctor'])?$_REQUEST['doctor_doctor']:0,
	'nurse' =>isset($_REQUEST['nurse_doctor'])?$_REQUEST['nurse_doctor']:0,
	'receptionist' =>isset($_REQUEST['receptionist_doctor'])?$_REQUEST['receptionist_doctor']:0,
	'accountant' =>isset($_REQUEST['accountant_doctor'])?$_REQUEST['accountant_doctor']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_doctor'])?$_REQUEST['pharmacist_doctor']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_doctor'])?$_REQUEST['laboratorist_doctor']:0,
	'page_link'=>'doctor');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['patient'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Patient.png' ),'menu_title'=>'Inpatient',
	'patient' => isset($_REQUEST['patient_patient'])?$_REQUEST['patient_patient']:0,
	'doctor' => isset($_REQUEST['doctor_patient'])?$_REQUEST['doctor_patient']:0,
	'nurse' =>isset($_REQUEST['nurse_patient'])?$_REQUEST['nurse_patient']:0,
	'receptionist' =>isset($_REQUEST['receptionist_patient'])?$_REQUEST['receptionist_patient']:0,
	'accountant' =>isset($_REQUEST['accountant_patient'])?$_REQUEST['accountant_patient']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_patient'])?$_REQUEST['pharmacist_patient']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_patient'])?$_REQUEST['laboratorist_patient']:0,
	'page_link'=>'patient');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['outpatient'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/outpatient.png' ),'menu_title'=>'Outpatient',
	'patient' => isset($_REQUEST['patient_outpatient'])?$_REQUEST['patient_outpatient']:0,
	'doctor' => isset($_REQUEST['doctor_outpatient'])?$_REQUEST['doctor_outpatient']:0,
	'nurse' =>isset($_REQUEST['nurse_outpatient'])?$_REQUEST['nurse_outpatient']:0,
	'receptionist' =>isset($_REQUEST['receptionist_outpatient'])?$_REQUEST['receptionist_outpatient']:0,
	'accountant' =>isset($_REQUEST['accountant_outpatient'])?$_REQUEST['accountant_outpatient']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_outpatient'])?$_REQUEST['pharmacist_outpatient']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_outpatient'])?$_REQUEST['laboratorist_outpatient']:0,
	'page_link'=>'outpatient');
	//---------NEW MENU LINK END------------------
	
	//---------NEW MENU LINK START------------------
	$access_right['nurse'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Nurse.png' ),'menu_title'=>'Nurse',
	'patient' => isset($_REQUEST['patient_nurse'])?$_REQUEST['patient_nurse']:0,
	'doctor' => isset($_REQUEST['doctor_nurse'])?$_REQUEST['doctor_nurse']:0,
	'nurse' =>isset($_REQUEST['nurse_nurse'])?$_REQUEST['nurse_nurse']:0,
	'receptionist' =>isset($_REQUEST['receptionist_nurse'])?$_REQUEST['receptionist_nurse']:0,
	'accountant' =>isset($_REQUEST['accountant_nurse'])?$_REQUEST['accountant_nurse']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_nurse'])?$_REQUEST['pharmacist_nurse']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_nurse'])?$_REQUEST['laboratorist_nurse']:0,
	'page_link'=>'nurse');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['supportstaff'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/support.png' ),'menu_title'=>'Support Staff',
	'patient' => isset($_REQUEST['patient_supportstaff'])?$_REQUEST['patient_supportstaff']:0,
	'doctor' => isset($_REQUEST['doctor_supportstaff'])?$_REQUEST['doctor_supportstaff']:0,
	'nurse' =>isset($_REQUEST['nurse_supportstaff'])?$_REQUEST['nurse_supportstaff']:0,
	'receptionist' =>isset($_REQUEST['receptionist_supportstaff'])?$_REQUEST['receptionist_supportstaff']:0,
	'accountant' =>isset($_REQUEST['accountant_supportstaff'])?$_REQUEST['accountant_supportstaff']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_supportstaff'])?$_REQUEST['pharmacist_supportstaff']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_supportstaff'])?$_REQUEST['laboratorist_supportstaff']:0,
	'page_link'=>'supportstaff');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['pharmacist'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Pharmacist.png' ),'menu_title'=>'Pharmacist',
	'patient' => isset($_REQUEST['patient_pharmacist'])?$_REQUEST['patient_pharmacist']:0,
	'doctor' => isset($_REQUEST['doctor_pharmacist'])?$_REQUEST['doctor_pharmacist']:0,
	'nurse' =>isset($_REQUEST['nurse_pharmacist'])?$_REQUEST['nurse_pharmacist']:0,
	'receptionist' =>isset($_REQUEST['receptionist_pharmacist'])?$_REQUEST['receptionist_pharmacist']:0,
	'accountant' =>isset($_REQUEST['accountant_pharmacist'])?$_REQUEST['accountant_pharmacist']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_pharmacist'])?$_REQUEST['pharmacist_pharmacist']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_pharmacist'])?$_REQUEST['laboratorist_pharmacist']:0,
	'page_link'=>'pharmacist');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['laboratorystaff'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Laboratorist.png' ),'menu_title'=>'Laboratory Staff',
	'patient' => isset($_REQUEST['patient_laboratorystaff'])?$_REQUEST['patient_laboratorystaff']:0,
	'doctor' => isset($_REQUEST['doctor_laboratorystaff'])?$_REQUEST['doctor_laboratorystaff']:0,
	'nurse' =>isset($_REQUEST['nurse_laboratorystaff'])?$_REQUEST['nurse_laboratorystaff']:0,
	'receptionist' =>isset($_REQUEST['receptionist_laboratorystaff'])?$_REQUEST['receptionist_laboratorystaff']:0,
	'accountant' =>isset($_REQUEST['accountant_laboratorystaff'])?$_REQUEST['accountant_laboratorystaff']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_laboratorystaff'])?$_REQUEST['pharmacist_laboratorystaff']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_laboratorystaff'])?$_REQUEST['laboratorist_laboratorystaff']:0,
	'page_link'=>'laboratorystaff');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START----------------
	$access_right['accountant'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Accountant.png' ),'menu_title'=>'Accountant',
	'patient' => isset($_REQUEST['patient_accountant'])?$_REQUEST['patient_accountant']:0,
	'doctor' => isset($_REQUEST['doctor_accountant'])?$_REQUEST['doctor_accountant']:0,
	'nurse' =>isset($_REQUEST['nurse_accountant'])?$_REQUEST['nurse_accountant']:0,
	'receptionist' =>isset($_REQUEST['receptionist_accountant'])?$_REQUEST['receptionist_accountant']:0,
	'accountant' =>isset($_REQUEST['accountant_accountant'])?$_REQUEST['accountant_accountant']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_accountant'])?$_REQUEST['pharmacist_accountant']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_accountant'])?$_REQUEST['laboratorist_accountant']:0,
	'page_link'=>'accountant');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['medicine'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Medicine.png' ),'menu_title'=>'Medicine',
	'patient' => isset($_REQUEST['patient_medicine'])?$_REQUEST['patient_medicine']:0,
	'doctor' => isset($_REQUEST['doctor_medicine'])?$_REQUEST['doctor_medicine']:0,
	'nurse' =>isset($_REQUEST['nurse_medicine'])?$_REQUEST['nurse_medicine']:0,
	'receptionist' =>isset($_REQUEST['receptionist_medicine'])?$_REQUEST['receptionist_medicine']:0,
	'accountant' =>isset($_REQUEST['accountant_medicine'])?$_REQUEST['accountant_medicine']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_medicine'])?$_REQUEST['pharmacist_medicine']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_medicine'])?$_REQUEST['laboratorist_medicine']:0,
	'page_link'=>'medicine');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['treatment'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Treatment.png' ),'menu_title'=>'Treatment',
	'patient' => isset($_REQUEST['patient_treatment'])?$_REQUEST['patient_treatment']:0,
	'doctor' => isset($_REQUEST['doctor_treatment'])?$_REQUEST['doctor_treatment']:0,
	'nurse' =>isset($_REQUEST['nurse_treatment'])?$_REQUEST['nurse_treatment']:0,
	'receptionist' =>isset($_REQUEST['receptionist_treatment'])?$_REQUEST['receptionist_treatment']:0,
	'accountant' =>isset($_REQUEST['accountant_treatment'])?$_REQUEST['accountant_treatment']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_treatment'])?$_REQUEST['pharmacist_treatment']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_treatment'])?$_REQUEST['laboratorist_treatment']:0,
	'page_link'=>'treatment');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['prescription'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Prescription.png' ),'menu_title'=>'Prescription',
	'patient' => isset($_REQUEST['patient_prescription'])?$_REQUEST['patient_prescription']:0,
	'doctor' => isset($_REQUEST['doctor_prescription'])?$_REQUEST['doctor_prescription']:0,
	'nurse' =>isset($_REQUEST['nurse_prescription'])?$_REQUEST['nurse_prescription']:0,
	'receptionist' =>isset($_REQUEST['receptionist_prescription'])?$_REQUEST['receptionist_prescription']:0,
	'accountant' =>isset($_REQUEST['accountant_prescription'])?$_REQUEST['accountant_prescription']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_prescription'])?$_REQUEST['pharmacist_prescription']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_prescription'])?$_REQUEST['laboratorist_prescription']:0,
	'page_link'=>'prescription');
	//---------NEW MENU LINK END------------------
	
	//---------NEW MENU LINK START------------------
	$access_right['bedallotment'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Assign--Bed-nurse.png' ),'menu_title'=>'Assign Bed-Nurse',
	'patient' => isset($_REQUEST['patient_bedallotment'])?$_REQUEST['patient_bedallotment']:0,
	'doctor' => isset($_REQUEST['doctor_bedallotment'])?$_REQUEST['doctor_bedallotment']:0,
	'nurse' =>isset($_REQUEST['nurse_bedallotment'])?$_REQUEST['nurse_bedallotment']:0,
	'receptionist' =>isset($_REQUEST['receptionist_bedallotment'])?$_REQUEST['receptionist_bedallotment']:0,
	'accountant' =>isset($_REQUEST['accountant_bedallotment'])?$_REQUEST['accountant_bedallotment']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_bedallotment'])?$_REQUEST['pharmacist_bedallotment']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_bedallotment'])?$_REQUEST['laboratorist_bedallotment']:0,
	'page_link'=>'bedallotment');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START----------------
	$access_right['operation'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Operation-List.png' ),'menu_title'=>'Operation List',
	'patient' => isset($_REQUEST['patient_operation'])?$_REQUEST['patient_operation']:0,
	'doctor' => isset($_REQUEST['doctor_operation'])?$_REQUEST['doctor_operation']:0,
	'nurse' =>isset($_REQUEST['nurse_operation'])?$_REQUEST['nurse_operation']:0,
	'receptionist' =>isset($_REQUEST['receptionist_operation'])?$_REQUEST['receptionist_operation']:0,
	'accountant' =>isset($_REQUEST['accountant_operation'])?$_REQUEST['accountant_operation']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_operation'])?$_REQUEST['pharmacist_operation']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_operation'])?$_REQUEST['laboratorist_operation']:0,
	'page_link'=>'operation');
	//---------NEW MENU LINK END------------------
	
	
	//---------NEW MENU LINK START----------------
	$access_right['diagnosis'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Diagnosis-Report.png' ),'menu_title'=>'Diagnosis',
	'patient' => isset($_REQUEST['patient_diagnosis'])?$_REQUEST['patient_diagnosis']:0,
	'doctor' => isset($_REQUEST['doctor_diagnosis'])?$_REQUEST['doctor_diagnosis']:0,
	'nurse' =>isset($_REQUEST['nurse_diagnosis'])?$_REQUEST['nurse_diagnosis']:0,
	'receptionist' =>isset($_REQUEST['receptionist_diagnosis'])?$_REQUEST['receptionist_diagnosis']:0,
	'accountant' =>isset($_REQUEST['accountant_diagnosis'])?$_REQUEST['accountant_diagnosis']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_diagnosis'])?$_REQUEST['pharmacist_diagnosis']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_diagnosis'])?$_REQUEST['laboratorist_diagnosis']:0,
	'page_link'=>'diagnosis');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['bloodbank'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Blood-Bank.png' ),'menu_title'=>'Blood Bank',
	'patient' => isset($_REQUEST['patient_bloodbank'])?$_REQUEST['patient_bloodbank']:0,
	'doctor' => isset($_REQUEST['doctor_bloodbank'])?$_REQUEST['doctor_bloodbank']:0,
	'nurse' =>isset($_REQUEST['nurse_bloodbank'])?$_REQUEST['nurse_bloodbank']:0,
	'receptionist' =>isset($_REQUEST['receptionist_bloodbank'])?$_REQUEST['receptionist_bloodbank']:0,
	'accountant' =>isset($_REQUEST['accountant_bloodbank'])?$_REQUEST['accountant_bloodbank']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_bloodbank'])?$_REQUEST['pharmacist_bloodbank']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_bloodbank'])?$_REQUEST['laboratorist_bloodbank']:0,
	'page_link'=>'bloodbank');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['appointment'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Appointment.png' ),'menu_title'=>'Appointment',
	'patient' => isset($_REQUEST['patient_appointment'])?$_REQUEST['patient_appointment']:0,
	'doctor' => isset($_REQUEST['doctor_appointment'])?$_REQUEST['doctor_appointment']:0,
	'nurse' =>isset($_REQUEST['nurse_appointment'])?$_REQUEST['nurse_appointment']:0,
	'receptionist' =>isset($_REQUEST['receptionist_appointment'])?$_REQUEST['receptionist_appointment']:0,
	'accountant' =>isset($_REQUEST['accountant_appointment'])?$_REQUEST['accountant_appointment']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_appointment'])?$_REQUEST['pharmacist_appointment']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_appointment'])?$_REQUEST['laboratorist_appointment']:0,
	'page_link'=>'appointment');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['invoice'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/payment.png' ),'menu_title'=>'Invoice',
	'patient' => isset($_REQUEST['patient_invoice'])?$_REQUEST['patient_invoice']:0,
	'doctor' => isset($_REQUEST['doctor_invoice'])?$_REQUEST['doctor_invoice']:0,
	'nurse' =>isset($_REQUEST['nurse_invoice'])?$_REQUEST['nurse_invoice']:0,
	'receptionist' =>isset($_REQUEST['receptionist_invoice'])?$_REQUEST['receptionist_invoice']:0,
	'accountant' =>isset($_REQUEST['accountant_invoice'])?$_REQUEST['accountant_invoice']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_invoice'])?$_REQUEST['pharmacist_invoice']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_invoice'])?$_REQUEST['laboratorist_invoice']:0,
	'page_link'=>'invoice');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['event'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/notice.png' ),'menu_title'=>'Event',
	'patient' => isset($_REQUEST['patient_event'])?$_REQUEST['patient_event']:0,
	'doctor' => isset($_REQUEST['doctor_event'])?$_REQUEST['doctor_event']:0,
	'nurse' =>isset($_REQUEST['nurse_event'])?$_REQUEST['nurse_event']:0,
	'receptionist' =>isset($_REQUEST['receptionist_event'])?$_REQUEST['receptionist_event']:0,
	'accountant' =>isset($_REQUEST['accountant_event'])?$_REQUEST['accountant_event']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_event'])?$_REQUEST['pharmacist_event']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_event'])?$_REQUEST['laboratorist_event']:0,
	'page_link'=>'event');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['message'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/message.png' ),'menu_title'=>'Message',
	'patient' => isset($_REQUEST['patient_message'])?$_REQUEST['patient_message']:0,
	'doctor' => isset($_REQUEST['doctor_message'])?$_REQUEST['doctor_message']:0,
	'nurse' =>isset($_REQUEST['nurse_message'])?$_REQUEST['nurse_message']:0,
	'receptionist' =>isset($_REQUEST['receptionist_message'])?$_REQUEST['receptionist_message']:0,
	'accountant' =>isset($_REQUEST['accountant_message'])?$_REQUEST['accountant_message']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_message'])?$_REQUEST['pharmacist_message']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_message'])?$_REQUEST['laboratorist_message']:0,
	'page_link'=>'message');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['ambulance'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Ambulance.png' ),'menu_title'=>'Ambulance',
	'patient' => isset($_REQUEST['patient_ambulance'])?$_REQUEST['patient_ambulance']:0,
	'doctor' => isset($_REQUEST['doctor_ambulance'])?$_REQUEST['doctor_ambulance']:0,
	'nurse' =>isset($_REQUEST['nurse_ambulance'])?$_REQUEST['nurse_ambulance']:0,
	'receptionist' =>isset($_REQUEST['receptionist_ambulance'])?$_REQUEST['receptionist_ambulance']:0,
	'accountant' =>isset($_REQUEST['accountant_ambulance'])?$_REQUEST['accountant_ambulance']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_ambulance'])?$_REQUEST['pharmacist_ambulance']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_ambulance'])?$_REQUEST['laboratorist_ambulance']:0,
	'page_link'=>'ambulance');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START------------------
	$access_right['report'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Report.png' ),'menu_title'=>'Report',
	'patient' => isset($_REQUEST['patient_report'])?$_REQUEST['patient_report']:0,
	'doctor' => isset($_REQUEST['doctor_report'])?$_REQUEST['doctor_report']:0,
	'nurse' =>isset($_REQUEST['nurse_report'])?$_REQUEST['nurse_report']:0,
	'receptionist' =>isset($_REQUEST['receptionist_report'])?$_REQUEST['receptionist_report']:0,
	'accountant' =>isset($_REQUEST['accountant_report'])?$_REQUEST['accountant_report']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_report'])?$_REQUEST['pharmacist_report']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_report'])?$_REQUEST['laboratorist_report']:0,
	'page_link'=>'report');
	//---------NEW MENU LINK END------------------
	//---------NEW MENU LINK START----------------
	$access_right['account'] =array('menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/account.png' ),'menu_title'=>'Account',
	'patient' => isset($_REQUEST['patient_account'])?$_REQUEST['patient_account']:0,
	'doctor' => isset($_REQUEST['doctor_account'])?$_REQUEST['doctor_account']:0,
	'nurse' =>isset($_REQUEST['nurse_account'])?$_REQUEST['nurse_account']:0,
	'receptionist' =>isset($_REQUEST['receptionist_account'])?$_REQUEST['receptionist_account']:0,
	'accountant' =>isset($_REQUEST['accountant_account'])?$_REQUEST['accountant_account']:0,
	'pharmacist' =>isset($_REQUEST['pharmacist_account'])?$_REQUEST['pharmacist_account']:0,
	'laboratorist' =>isset($_REQUEST['laboratorist_account'])?$_REQUEST['laboratorist_account']:0,
	'page_link'=>'account');
	//---------NEW MENU LINK END------------------
	
	
	
	$result=update_option( 'hmgt_access_right',$access_right );
	wp_redirect ( admin_url() . 'admin.php?page=hmgt_access_right&message=1');
}
$access_right=get_option( 'hmgt_access_right');

if(isset($_REQUEST['message']))
{
	$message =$_REQUEST['message'];
	if($message == 1)
	{?>
			<div id="message" class="updated below-h2 ">
			<p>
			<?php 
				_e('Record Updated Successfully','school-mgt');
			?></p></div>
			<?php 
		
	}
}

?>

<div class="page-inner" style="min-height:1631px !important">
<div class="page-title">


		<h3><img src="<?php echo get_option( 'hmgt_hospital_logo' ) ?>" class="img-circle head_logo" width="40" height="40" /><?php echo get_option( 'hmgt_hospital_name' );?></h3>
	</div>
	<div id="main-wrapper">
	<div class="panel panel-white">
					<div class="panel-body">
<h2>
        	<?php echo esc_html( __( 'General Settings', 'school-mgt')); ?>
        </h2>
		<div class="panel-body">
        <form name="student_form" action="" method="post" class="form-horizontal" id="access_right_form">
		<div class="row">
		<div class="col-md-2"><?php _e('Menu','hospital_mgt');?></div>
		<div class="col-md-1"><?php _e('Doctor','hospital_mgt');?></div>
		<div class="col-md-1"><?php _e('Patient','hospital_mgt');?></div>
		<div class="col-md-1"><?php _e('Nurse','hospital_mgt');?></div>
		<div class="col-md-1"><?php _e('Laboratorist','hospital_mgt');?></div>
		<div class="col-md-1"><?php _e('Pharmacist','hospital_mgt');?></div>
		<div class="col-md-1"><?php _e('Accountant','hospital_mgt');?></div>
		<div class="col-md-2"><?php _e('Support Staff','hospital_mgt');?></div>
		</div>
		<!--<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Dashboard','school-mgt');?>
				</span>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['dashboard']['doctor'],1);?> value="1" name="doctor_dashboard" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['dashboard']['patient'],1);?> value="1" name="patient_dashboard" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['dashboard']['nurse'],1);?> value="1" name="nurse_dashboard" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['dashboard']['laboratorist'],1);?> value="1" name="laboratorist_dashboard" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['dashboard']['pharmacist'],1);?> value="1" name="pharmacist_dashboard" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['dashboard']['accountant'],1);?> value="1" name="accountant_dashboard" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['dashboard']['receptionist'],1);?> value="1" name="receptionist_dashboard" readonly>	              
					</label>
				</div>
			</div>
			
		</div>-->
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Doctor','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['doctor']['doctor'],1);?> value="1" name="doctor_doctor" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['doctor']['patient'],1);?> value="1" name="patient_doctor" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['doctor']['nurse'],1);?> value="1" name="nurse_doctor" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['doctor']['laboratorist'],1);?> value="1" name="laboratorist_doctor" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['doctor']['pharmacist'],1);?> value="1" name="pharmacist_doctor" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['doctor']['accountant'],1);?> value="1" name="accountant_doctor">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['doctor']['receptionist'],1);?> value="1" name="receptionist_doctor" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Patient','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['patient']['doctor'],1);?> value="1" name="doctor_patient" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['patient']['patient'],1);?> value="1" name="patient_patient" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['patient']['nurse'],1);?> value="1" name="nurse_patient" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['patient']['laboratorist'],1);?> value="1" name="laboratorist_patient" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['patient']['pharmacist'],1);?> value="1" name="pharmacist_patient" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['patient']['accountant'],1);?> value="1" name="accountant_patient">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['patient']['receptionist'],1);?> value="1" name="receptionist_patient" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Outpatient','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['outpatient']['doctor'],1);?> value="1" name="doctor_outpatient">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['outpatient']['patient'],1);?> value="1" name="patient_outpatient">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['outpatient']['nurse'],1);?> value="1" name="nurse_outpatient" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['outpatient']['laboratorist'],1);?> value="1" name="laboratorist_outpatient" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['outpatient']['pharmacist'],1);?> value="1" name="pharmacist_outpatient" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['outpatient']['accountant'],1);?> value="1" name="accountant_outpatient" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['outpatient']['receptionist'],1);?> value="1" name="receptionist_outpatient" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Nurse','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['nurse']['doctor'],1);?> value="1" name="doctor_nurse" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['nurse']['patient'],1);?> value="1" name="patient_nurse" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['nurse']['nurse'],1);?> value="1" name="nurse_nurse" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['nurse']['laboratorist'],1);?> value="1" name="laboratorist_nurse" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['nurse']['pharmacist'],1);?> value="1" name="pharmacist_nurse" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['nurse']['accountant'],1);?> value="1" name="accountant_nurse" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['nurse']['receptionist'],1);?> value="1" name="receptionist_nurse" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Support Staff','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['supportstaff']['doctor'],1);?> value="1" name="doctor_supportstaff" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['supportstaff']['patient'],1);?> value="1" name="patient_supportstaff" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['supportstaff']['nurse'],1);?> value="1" name="nurse_supportstaff" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['supportstaff']['laboratorist'],1);?> value="1" name="laboratorist_supportstaff" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['supportstaff']['pharmacist'],1);?> value="1" name="pharmacist_supportstaff" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['supportstaff']['accountant'],1);?> value="1" name="accountant_supportstaff" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['supportstaff']['receptionist'],1);?> value="1" name="receptionist_supportstaff" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Pharmacist','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['pharmacist']['doctor'],1);?> value="1" name="doctor_pharmacist" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['pharmacist']['patient'],1);?> value="1" name="patient_pharmacist" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['pharmacist']['nurse'],1);?> value="1" name="nurse_pharmacist" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['pharmacist']['laboratorist'],1);?> value="1" name="laboratorist_pharmacist" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['pharmacist']['pharmacist'],1);?> value="1" name="pharmacist_pharmacist" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['pharmacist']['accountant'],1);?> value="1" name="accountant_pharmacist" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['pharmacist']['receptionist'],1);?> value="1" name="receptionist_pharmacist" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Laboratorist','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['laboratorystaff']['doctor'],1);?> value="1" name="doctor_laboratorystaff" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['laboratorystaff']['patient'],1);?> value="1" name="patient_laboratorystaff" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['laboratorystaff']['nurse'],1);?> value="1" name="nurse_laboratorystaff" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['laboratorystaff']['laboratorist'],1);?> value="1" name="laboratorist_laboratorystaff" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['laboratorystaff']['pharmacist'],1);?> value="1" name="pharmacist_laboratorystaff" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['laboratorystaff']['accountant'],1);?> value="1" name="accountant_laboratorystaff" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['laboratorystaff']['receptionist'],1);?> value="1" name="receptionist_laboratorystaff" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Accountant','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['accountant']['doctor'],1);?> value="1" name="doctor_accountant" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['accountant']['patient'],1);?> value="1" name="patient_accountant" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['accountant']['nurse'],1);?> value="1" name="nurse_accountant" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['accountant']['laboratorist'],1);?> value="1" name="laboratorist_accountant" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['accountant']['pharmacist'],1);?> value="1" name="pharmacist_accountant" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['accountant']['accountant'],1);?> value="1" name="accountant_accountant" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['accountant']['receptionist'],1);?> value="1" name="receptionist_accountant" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Medicine','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['medicine']['doctor'],1);?> value="1" name="doctor_medicine" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['medicine']['patient'],1);?> value="1" name="patient_medicine" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['medicine']['nurse'],1);?> value="1" name="nurse_medicine" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['medicine']['laboratorist'],1);?> value="1" name="laboratorist_medicine" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['medicine']['pharmacist'],1);?> value="1" name="pharmacist_medicine" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['medicine']['accountant'],1);?> value="1" name="accountant_medicine" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['medicine']['receptionist'],1);?> value="1" name="receptionist_medicine" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Treatment','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['treatment']['doctor'],1);?> value="1" name="doctor_treatment">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['treatment']['patient'],1);?> value="1" name="patient_treatment" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['treatment']['nurse'],1);?> value="1" name="nurse_treatment" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['treatment']['laboratorist'],1);?> value="1" name="laboratorist_treatment" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['treatment']['pharmacist'],1);?> value="1" name="pharmacist_treatment" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['treatment']['accountant'],1);?> value="1" name="accountant_treatment" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['treatment']['receptionist'],1);?> value="1" name="receptionist_treatment" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Prescription','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['prescription']['doctor'],1);?> value="1" name="doctor_prescription" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['prescription']['patient'],1);?> value="1" name="patient_prescription" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['prescription']['nurse'],1);?> value="1" name="nurse_prescription" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['prescription']['laboratorist'],1);?> value="1" name="laboratorist_prescription" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['prescription']['pharmacist'],1);?> value="1" name="pharmacist_prescription" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['prescription']['accountant'],1);?> value="1" name="accountant_prescription" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['prescription']['receptionist'],1);?> value="1" name="receptionist_prescription" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Assign Bed-Nurse','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bedallotment']['doctor'],1);?> value="1" name="doctor_bedallotment" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bedallotment']['patient'],1);?> value="1" name="patient_bedallotment" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bedallotment']['nurse'],1);?> value="1" name="nurse_bedallotment" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bedallotment']['laboratorist'],1);?> value="1" name="laboratorist_bedallotment" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bedallotment']['pharmacist'],1);?> value="1" name="pharmacist_bedallotment" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bedallotment']['accountant'],1);?> value="1" name="accountant_bedallotment" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bedallotment']['receptionist'],1);?> value="1" name="receptionist_bedallotment" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Operation List','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['operation']['doctor'],1);?> value="1" name="doctor_operation" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['operation']['patient'],1);?> value="1" name="patient_operation" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['operation']['nurse'],1);?> value="1" name="nurse_operation" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['operation']['laboratorist'],1);?> value="1" name="laboratorist_operation" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['operation']['pharmacist'],1);?> value="1" name="pharmacist_operation" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['operation']['accountant'],1);?> value="1" name="accountant_operation" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['operation']['receptionist'],1);?> value="1" name="receptionist_operation" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Diagnosis','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['diagnosis']['doctor'],1);?> value="1" name="doctor_diagnosis" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['diagnosis']['patient'],1);?> value="1" name="patient_diagnosis" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['diagnosis']['nurse'],1);?> value="1" name="nurse_diagnosis" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['diagnosis']['laboratorist'],1);?> value="1" name="laboratorist_diagnosis" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['diagnosis']['pharmacist'],1);?> value="1" name="pharmacist_diagnosis" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['diagnosis']['accountant'],1);?> value="1" name="accountant_diagnosis" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['diagnosis']['receptionist'],1);?> value="1" name="receptionist_diagnosis" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Blood Bank','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bloodbank']['doctor'],1);?> value="1" name="doctor_bloodbank" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bloodbank']['patient'],1);?> value="1" name="patient_bloodbank" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bloodbank']['nurse'],1);?> value="1" name="nurse_bloodbank" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bloodbank']['laboratorist'],1);?> value="1" name="laboratorist_bloodbank" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bloodbank']['pharmacist'],1);?> value="1" name="pharmacist_bloodbank" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bloodbank']['accountant'],1);?> value="1" name="accountant_bloodbank" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['bloodbank']['receptionist'],1);?> value="1" name="receptionist_bloodbank" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Appointment','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['appointment']['doctor'],1);?> value="1" name="doctor_appointment" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['appointment']['patient'],1);?> value="1" name="patient_appointment" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['appointment']['nurse'],1);?> value="1" name="nurse_appointment" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['appointment']['laboratorist'],1);?> value="1" name="laboratorist_appointment" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['appointment']['pharmacist'],1);?> value="1" name="pharmacist_appointment" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['appointment']['accountant'],1);?> value="1" name="accountant_appointment" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['appointment']['receptionist'],1);?> value="1" name="receptionist_appointment" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<!--------NEW PART START--------------->
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Invoice','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['invoice']['doctor'],1);?> value="1" name="doctor_invoice" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['invoice']['patient'],1);?> value="1" name="patient_invoice" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['invoice']['nurse'],1);?> value="1" name="nurse_invoice" disabled="disabled">	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['invoice']['laboratorist'],1);?> value="1" name="laboratorist_invoice" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['invoice']['pharmacist'],1);?> value="1" name="pharmacist_invoice" disabled="disabled">	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['invoice']['accountant'],1);?> value="1" name="accountant_invoice" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['invoice']['receptionist'],1);?> value="1" name="receptionist_invoice" disabled="disabled">	              
					</label>
				</div>
			</div>
		</div>
		<!--------NEW PART END----------------->
		<!--------NEW PART START--------------->
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Event','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['event']['doctor'],1);?> value="1" name="doctor_event" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['event']['patient'],1);?> value="1" name="patient_event" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['event']['nurse'],1);?> value="1" name="nurse_event" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['event']['laboratorist'],1);?> value="1" name="laboratorist_event" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['event']['pharmacist'],1);?> value="1" name="pharmacist_event" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['event']['accountant'],1);?> value="1" name="accountant_event" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['event']['receptionist'],1);?> value="1" name="receptionist_event" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<!--------NEW PART END----------------->
		<!--------NEW PART START--------------->
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Message','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['message']['doctor'],1);?> value="1" name="doctor_message" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['message']['patient'],1);?> value="1" name="patient_message" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['message']['nurse'],1);?> value="1" name="nurse_message" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['message']['laboratorist'],1);?> value="1" name="laboratorist_message" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['message']['pharmacist'],1);?> value="1" name="pharmacist_message" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['message']['accountant'],1);?> value="1" name="accountant_message" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['message']['receptionist'],1);?> value="1" name="receptionist_message" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<!--------NEW PART END----------------->
		<!--------NEW PART START--------------->
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Ambulance','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['ambulance']['doctor'],1);?> value="1" name="doctor_ambulance" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['ambulance']['patient'],1);?> value="1" name="patient_ambulance" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['ambulance']['nurse'],1);?> value="1" name="nurse_ambulance" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['ambulance']['laboratorist'],1);?> value="1" name="laboratorist_ambulance" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['ambulance']['pharmacist'],1);?> value="1" name="pharmacist_ambulance" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['ambulance']['accountant'],1);?> value="1" name="accountant_ambulance" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['ambulance']['receptionist'],1);?> value="1" name="receptionist_ambulance" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<!--------NEW PART END----------------->
		<!--------NEW PART START--------------->
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Report','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['report']['doctor'],1);?> value="1" name="doctor_report">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['report']['patient'],1);?> value="1" name="patient_report" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['report']['nurse'],1);?> value="1" name="nurse_report" disabled="disabled">	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['report']['laboratorist'],1);?> value="1" name="laboratorist_report" disabled="disabled">	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['report']['pharmacist'],1);?> value="1" name="pharmacist_report" disabled="disabled">	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['report']['accountant'],1);?> value="1" name="accountant_report" disabled="disabled"></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['report']['receptionist'],1);?> value="1" name="receptionist_report" disabled="disabled">	              
					</label>
				</div>
			</div>
		</div>
		<!--------NEW PART END----------------->
		<!--------NEW PART START--------------->
		<div class="row">
			<div class="col-md-2">
				<span class="menu-label">
					<?php _e('Account','school-mgt');?>
				</span>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['account']['doctor'],1);?> value="1" name="doctor_account" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['account']['patient'],1);?> value="1" name="patient_account" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['account']['nurse'],1);?> value="1" name="nurse_account" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['account']['laboratorist'],1);?> value="1" name="laboratorist_account" readonly>	              
					</label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['account']['pharmacist'],1);?> value="1" name="pharmacist_account" readonly>	              
					</label>
				</div>
			</div>
			
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['account']['accountant'],1);?> value="1" name="accountant_account" readonly></label>
				</div>
			</div>
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" <?php echo checked($access_right['account']['receptionist'],1);?> value="1" name="receptionist_account" readonly>	              
					</label>
				</div>
			</div>
		</div>
		<!--------NEW PART END----------------->
		
		<div class="col-sm-offset-2 col-sm-8 row_bottom">
        	
        	<input type="submit" value="<?php _e('Save', 'hospital_mgt' ); ?>" name="save_access_right" class="btn btn-success"/>
        </div>
        
        
        </form>
		</div>
        </div>
        </div>
        </div>
        </div>
 <?php

?> 