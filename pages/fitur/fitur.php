<?php
class fiturObj  extends DaftarObj2{
	var $Prefix = 'fitur';
	var $elCurrPage="HalDefault";
	var $SHOW_CEK = TRUE;
	var $TblName = 'fitur'; //daftar
	var $TblName_Hapus = 'fitur';
	var $MaxFlush = 10;
	var $TblStyle = array( 'koptable', 'cetak','cetak'); //berdasar mode
	var $ColStyle = array( 'GarisDaftar', 'GarisCetak','GarisCetak');
	var $KeyFields = array('id');
	var $FieldSum = array();//array('jml_harga');
	var $SumValue = array();
	var $FieldSum_Cp1 = array( 14, 13, 13);//berdasar mode
	var $FieldSum_Cp2 = array( 1, 1, 1);
	var $checkbox_rowspan = 1;
	var $PageTitle = 'GENERAL SETTING';
	var $PageIcon = 'images/masterdata_ico.gif';
	var $pagePerHal ='';
	var $cetak_xls=TRUE ;
	var $fileNameExcel='usulansk.xls';
	var $Cetak_Judul = 'System';
	var $Cetak_Mode=2;
	var $Cetak_WIDTH = '30cm';
	var $Cetak_OtherHTMLHead;
	var $FormName = 'fiturForm';
	var $username = "";

	var $Status = array(
				array('1','AKTIF'),
				array('2','TIDAK AKTIF'),
		);

    var $arrayVisible = array(
				array('1','TRUE'),
				array('0','FALSE'),
		);

	var $Level = array(
				array('1','1'),
				array('2','2'),
				array('3','3'),
		);

	var $Posisi = array(
				array('1','HEADER'),
				array('2','FOOTER'),
		);

	var $Jenis = array(
				array('1','A'),
				array('2','B'),
				array('3','C'),
				array('4','D'),
		);

	var $Typelink = array(
				array('1','TEKS'),
				array('2','BUTTON'),
		);

	function setTitle(){
		return '';
	}

	function setMenuView(){
		return "";
	}
	function setMenuEdit(){
		return
			"";
		;
	}

function setPage_HeaderOther(){

		return
		""
		;
	}

	function baseToImage($base64_string, $output_file) {

	    $ifp = fopen( $output_file, 'wb' );
	    $data = explode( ',', $base64_string );

	    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

	    fclose( $ifp );

	    return $output_file;
	}

	function simpan(){
	  global $HTTP_COOKIE_VARS;
	 global $Main;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content=''; $json=TRUE;
	//get data -----------------
	 $fmST = $_REQUEST[$this->Prefix.'_fmST'];
	 $idplh = $_REQUEST[$this->Prefix.'_idplh'];
	 foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
	 if(empty($id_system)){
	 	$err = "Pilih System";
	 }elseif(empty($id_modul)){
	 	$err = "Pilih Modul";
	 }elseif(empty($id_sub_modul)){
	 	$err = "Pilih Sub Modul";
	 }elseif(empty($id_sub_sub_modul)){
	 	$err = "Pilih Sub Sub Modul";
	 }elseif(empty($nama)){
	 	$err = "Isi Nama";
	 }elseif(empty($nama)){
	 	$err = "Isi Nama";
	 }
		if($fmST == 0){
			if($err==''){
					$getMaxKodeSubSubSubModul = mysql_fetch_array(mysql_query("select max(id_sub_sub_sub_modul) from $this->TblName where id_system ='$id_system' and id_modul ='$id_modul' and id_sub_modul ='$id_sub_modul' and id_sub_sub_modul ='$id_sub_sub_modul'"));
					$id_sub_sub_sub_modul = $getMaxKodeSubSubSubModul['max(id_sub_sub_sub_modul)'] + 1;
					$data = array(
									'id_system' => $id_system,
								  	'id_modul' => $id_modul,
									'id_sub_modul' => $id_sub_modul,
									'id_sub_sub_modul' => $id_sub_sub_modul,
									'id_sub_sub_sub_modul' => $id_sub_sub_sub_modul,
									'nama'=> $nama,
									'title' => $title,
									'url' => $url,
									'hint' => $hint,
									'status' => $status,
									'user_create' => $this->username,
									'tanggal_create' => date("Y-m-d"),
									'user_update' => "",
									'tanggal_update' => "",
								  );
						mysql_query(VulnWalkerInsert("system",$data));
						$cek = VulnWalkerInsert("system",$data);


				}
			}else{
				if($err==''){
					$getMaxKodeSubSubSubModul = mysql_fetch_array(mysql_query("select max(id_sub_sub_sub_modul) from $this->TblName where id_system ='$id_system' and id_modul ='$id_modul' and id_sub_modul ='$id_sub_modul' and id_sub_sub_modul ='$id_sub_sub_modul' and id !='$idEdit'"));
					$id_sub_sub_sub_modul = $getMaxKodeSubSubSubModul['max(id_sub_sub_sub_modul)'] + 1;
					$data = array(
									'id_system' => $id_system,
								  	'id_modul' => $id_modul,
									'id_sub_modul' => $id_sub_modul,
									'id_sub_sub_modul' => $id_sub_sub_modul,
									'id_sub_sub_sub_modul' => $id_sub_sub_sub_modul,
									'nama'=> $nama,
									'title' => $title,
									'url' => $url,
									'hint' => $hint,
									'status' => $status,
									'user_create' => $this->username,
									'tanggal_create' => date("Y-m-d"),
									'user_update' => "",
									'tanggal_update' => "",
								  );
					$query = VulnWalkerUpdate($this->TblName,$data,"id ='$idEdit'");
					mysql_query($query);
					$cek = $query;
				}
			}

			return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
    }

	function set_selector_other2($tipe){
	 global $Main;
	 $cek = ''; $err=''; $content=''; $json=TRUE;
	 return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content, 'json'=>$json);
	}

	function set_selector_other($tipe){
	 global $Main;
	 $cek = ''; $err=''; $content=''; $json=TRUE;

	  switch($tipe){

		case 'formBaru':{
			$fm = $this->setFormBaru();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'tontonVideoReward':{
			$fm = $this->tontonVideoReward();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'tontonVideoReward2':{
			$fm = $this->tontonVideoReward2();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'tontonVideoReward3':{
			$fm = $this->tontonVideoReward3();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'absenReward':{
			$fm = $this->absenReward();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'bonusIklanStatus':{
			$fm = $this->bonusIklanStatus();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'bonusIklanStatus2':{
			$fm = $this->bonusIklanStatus2();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'bonusIklan':{
			$fm = $this->bonusIklan();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'bonusIklan2':{
			$fm = $this->bonusIklan2();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}


		case 'saveKolom':{
			$data = array("row" => $_REQUEST['maxRow'], "kolom" => $_REQUEST['maxKolom']);
			$query = VulnWalkerUpdate("setting_kolom",$data,"1=1");
			mysql_query($query);

		break;
		}
		case 'saveTontonVideoReward':{
			$data = array("minimal" => $_REQUEST['minimal'], "maksimal" => $_REQUEST['maksimal'], "limit_iklan" => $_REQUEST['limit'], "delay_iklan" => $_REQUEST['delay'], "notice_iklan" => $_REQUEST['notice']);
			$query = VulnWalkerUpdate("reward_point",$data,"jenis_iklan='TONTON VIDEO'");
			mysql_query($query);

		break;
		}

		case 'saveTontonVideoReward2':{
			$data = array("minimal" => $_REQUEST['minimal'], "maksimal" => $_REQUEST['maksimal'], "limit_iklan" => $_REQUEST['limit'], "delay_iklan" => $_REQUEST['delay'], "notice_iklan" => $_REQUEST['notice']);
			$query = VulnWalkerUpdate("reward_point",$data,"jenis_iklan='TONTON VIDEO 2'");
			mysql_query($query);

		break;
		}
		case 'saveTontonVideoReward3':{
			$data = array("minimal" => $_REQUEST['minimal'], "maksimal" => $_REQUEST['maksimal'], "limit_iklan" => $_REQUEST['limit'], "delay_iklan" => $_REQUEST['delay'], "notice_iklan" => $_REQUEST['notice']);
			$query = VulnWalkerUpdate("reward_point",$data,"jenis_iklan='TONTON VIDEO 3'");
			mysql_query($query);

		break;
		}
		case 'saveAbsenReward':{
			$data = array("minimal" => $_REQUEST['minimal'], "maksimal" => $_REQUEST['maksimal']);
			$query = VulnWalkerUpdate("reward_point",$data,"jenis_iklan='ABSEN HARIAN'");
			mysql_query($query);

		break;
		}
		case 'saveBonusIklan':{
			$data = array("minimal" => $_REQUEST['minimal'], "maksimal" => $_REQUEST['maksimal'], "limit_iklan" => $_REQUEST['limit'], "delay_iklan" => $_REQUEST['delay'], "notice_iklan" => $_REQUEST['notice']);
			$query = VulnWalkerUpdate("reward_point",$data,"jenis_iklan='BONUS IKLAN'");
			$cek = $query;
			mysql_query($query);

		break;
		}
		case 'saveBonusIklan2':{
			$data = array("minimal" => $_REQUEST['minimal'], "maksimal" => $_REQUEST['maksimal'], "limit_iklan" => $_REQUEST['limit'], "delay_iklan" => $_REQUEST['delay'], "notice_iklan" => $_REQUEST['notice']);
			$query = VulnWalkerUpdate("reward_point",$data,"jenis_iklan='BONUS IKLAN 2'");
			$cek = $query;
			mysql_query($query);

		break;
		}
		case 'saveFontMenubar':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $fontMenubar);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='font_menu_bar'"));

		break;
		}
		case 'saveFontStyle':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $fontStyle);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='font_style'"));

		break;
		}
		case 'saveContentJenisFont':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $fontStyle);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='content_font_style'"));

		break;
		}
		case 'saveSiteTitle':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $siteTitle);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='site_title'"));

		break;
		}

		case 'saveCopyright':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $copyrightTitle);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='copyright_title'"));

		break;
		}

		case 'saveFooter':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $footerText);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='footer_text'"));

		break;
		}
		case 'saveFooterFontSize':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $footerFontSize);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='footer_font_size'"));

		break;
		}

		case 'saveMenuBarVisible':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $menuBarVisible);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='show_menu_bar'"));

		break;
		}
		case 'saveAbsenHarian':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('status' => $absenHarianStatus);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"fitur_name ='ABSEN'"));

		break;
		}
		case 'saveBonusIklanStatus':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('status' => $bonusIklanStatus);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"fitur_name ='BONUS IKLAN'"));

		break;
		}
		case 'saveBonusIklanStatus2':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('status' => $bonusIklanStatus);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"fitur_name ='BONUS IKLAN 2'"));

		break;
		}
		case 'saveTontonVideoStatus':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('status' => $tontonVideoStatus);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"fitur_name ='TONTON VIDEO'"));

		break;
		}
		case 'saveTontonVideoStatus2':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('status' => $tontonVideoStatus2);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"fitur_name ='TONTON VIDEO 2'"));

		break;
		}
		case 'saveTontonVideoStatus3':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('status' => $tontonVideoStatus3);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"fitur_name ='TONTON VIDEO 3'"));

		break;
		}
		case 'saveContentBackgroudActive':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $backgroundStatus);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='content_background_active'"));

		break;
		}
		case 'saveDateVisible':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $dateVisible);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='date_visible'"));

		break;
		}

		case 'saveCopyrightVisible':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $copyrightVisible);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='copyright_visible'"));

		break;
		}

		case 'saveFooterVisible':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $footerVisible);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='footer_visible'"));

		break;
		}
		case 'saveFooterImage':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $footerImage);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='footer_image'"));

		break;
		}
		case 'saveHeaderLogo':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $headerLogo);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='header_logo'"));

		break;
		}
		case 'saveHeaderImage':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $headerImage);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='header_image'"));

		break;
		}
		case 'saveSiteImages':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $siteImage);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='site_image'"));

		break;
		}
		case 'saveContentImage':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $contentImage);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='content_image'"));

		break;
		}
		case 'hapusContentImage':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $hapusContentImage);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='content_image'"));

		break;
		}
		case 'saveSiteUrl':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $siteUrl);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='site_url'"));

		break;
		}
		case 'saveHeaderTitle':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $headerTitle);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='header_title'"));

		break;
		}
		case 'saveHeightHeader':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $headerHeight);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='header_height'"));

		break;
		}
		case 'saveHeaderFontSize':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $headerFontSize);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='header_font_size'"));

		break;
		}
		case 'saveHeightLogo':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $logoHeight);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='height_logo'"));

		break;
		}
		case 'saveHeightMenubar':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $heightMenubar);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='height_menubar'"));

		break;
		}
		case 'saveMenubarFontSize':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $menubarFontSize);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='menubar_font_size'"));

		break;
		}
		case 'saveDropdownFontSize':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $dropdownFontSize);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='dropdown_font_size'"));

		break;
		}
		case 'saveWidthLogo':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $logoWidth);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='width_logo'"));

		break;
		}
		case 'saveHeaderColor':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $headerColor);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='header_color'"));

		break;
		}
		case 'saveDropDownBackGroundColor':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $dropDownColor);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='dropdown_background_color'"));

		break;
		}

		case 'saveHeaderTextColor':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $headerTextColor);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='header_text_color'"));

		break;
		}

		case 'saveCopyrightColor':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $copyrightColor);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='copyright_color'"));

		break;
		}

		case 'saveWarnaBackground':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $warnaBackground);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='background_content'"));

		break;
		}

		case 'saveMenuBarColor':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $menuColor);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='menu_bar_color'"));

		break;
		}

		case 'saveColorTextMenubar':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $colorTextMenubar);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='font_color_menubar'"));

		break;
		}

		case 'saveColorBorder':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $colorBorder);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='color_border_menubar'"));

		break;
		}

		case 'saveFooterColor':{
			foreach ($_REQUEST as $key => $value) {
			  $$key = $value;
			}
			$data = array('option_value' => $footerColor);
			mysql_query(VulnWalkerUpdate($this->TblName,$data,"option_name ='footer_color'"));

		break;
		}

		case 'editSiteTitle':{
			$fm = $this->editSiteTitle();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editFontStyle':{
			$fm = $this->editFontStyle();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editContentJenisFont':{
			$fm = $this->editContentJenisFont();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editFontMenubar':{
			$fm = $this->editFontMenubar();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editCopyRightText':{
			$fm = $this->editCopyRightText();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editFooterFontSize':{
			$fm = $this->editFooterFontSize();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editFooterText':{
			$fm = $this->editFooterText();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editSiteUrl':{
			$fm = $this->editSiteUrl();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editHeaderTitle':{
			$fm = $this->editHeaderTitle();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editHeightHeader':{
			$fm = $this->editHeightHeader();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editHeaderFontSize':{
			$fm = $this->editHeaderFontSize();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editHeightLogo':{
			$fm = $this->editHeightLogo();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editHeightMenubar':{
			$fm = $this->editHeightMenubar();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editMenubarFontSize':{
			$fm = $this->editMenubarFontSize();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editDropdownFontSize':{
			$fm = $this->editDropdownFontSize();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editWidthLogo':{
			$fm = $this->editWidthLogo();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editMenuBarVisible':{
			$fm = $this->editMenuBarVisible();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'absenHarian':{
			$fm = $this->absenHarian();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'tontonVideoStatus':{
			$fm = $this->tontonVideoStatus();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'tontonVideoStatus2':{
			$fm = $this->tontonVideoStatus2();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'tontonVideoStatus3':{
			$fm = $this->tontonVideoStatus3();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editContentBackGroundActive':{
			$fm = $this->editContentBackGroundActive();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editDateVisible':{
			$fm = $this->editDateVisible();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editCopyRightVisible':{
			$fm = $this->editCopyRightVisible();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editFooterVisible':{
			$fm = $this->editFooterVisible();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editHeaderLogo':{
			$fm = $this->editHeaderLogo();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editFooterImage':{
			$fm = $this->editFooterImage();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editHeaderImage':{
			$fm = $this->editHeaderImage();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editSiteImage':{
			$fm = $this->editSiteImage();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}
		case 'editContentImage':{
			$fm = $this->editContentImage();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editHeaderColor':{
			$fm = $this->editHeaderColor();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editDropDownBackGroundColor':{
			$fm = $this->editDropDownBackGroundColor();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editHeaderTextColor':{
			$fm = $this->editHeaderTextColor();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editCopyRightColor':{
			$fm = $this->editCopyRightColor();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editWarnaBackground':{
			$fm = $this->editWarnaBackground();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editMenuBarColor':{
			$fm = $this->editMenuBarColor();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editColorTextMenubar':{
			$fm = $this->editColorTextMenubar();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editColorBorder':{
			$fm = $this->editColorBorder();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'editFooterColor':{
			$fm = $this->editFooterColor();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'formEdit':{
			$fm = $this->setFormEdit();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'hapus':{
			$get= $this->Hapus();
			$cek = $get['cek'];
			$err = $get['err'];
			$content = $get['content'];
		break;
		}

		case 'formEdit':{
			$fm = $this->setFormEdit();
			$cek = $fm['cek'];
			$err = $fm['err'];
			$content = $fm['content'];
		break;
		}

		case 'simpan':{
			$get= $this->simpan();
			$cek = $get['cek'];
			$err = $get['err'];
			$content = $get['content'];
		break;
	    }



		 default:{
				$other = $this->set_selector_other2($tipe);
				$cek = $other['cek'];
				$err = $other['err'];
				$content=$other['content'];
				$json=$other['json'];
		 break;
		 }

	 }//end switch

		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content, 'json'=>$json);
   }


	function setPage_OtherScript(){
		$scriptload =

					"<script>
						$(document).ready(function(){
							".$this->Prefix.".loading();
						});

					</script>";

		return
			"<link rel='stylesheet' href='css/template_css.css' type='text/css'>
			<link rel='stylesheet' href='css/fontselect.css.css' type='text/css'>".
			"<script src='js/jquery.js' type='text/javascript'></script>".
			/*"<script src='js/jscolor.js' type='text/javascript'></script>".*/
			"<script src='js/spectrum/spectrum.js' type='text/javascript'></script>".
			"<link rel='stylesheet' href='js/spectrum/spectrum.css' type='text/css'>".
			 "<script type='text/javascript' src='js/fitur/fitur.js' language='JavaScript' ></script>".
			  "<script type='text/javascript' src='js/shortcut/popupImages.js' language='JavaScript' ></script>
			  <script type='text/javascript' src='js/jquery.fontselect.js' language='JavaScript' ></script>
			 <style>

						 .full-spectrum .sp-palette {
						max-width: 200px;
						}

			</style>


			 ".
			$scriptload;
	}

	//form ==================================
	function setFormBaru(){
		$dt=array();
		//$this->form_idplh ='';
		$this->form_fmST = 0;
		$dt['tgl'] = date("Y-m-d"); //set waktu sekarang
		$fm = $this->setForm($dt);
		return	array ('cek'=>$fm['cek'], 'err'=>$fm['err'], 'content'=>$fm['content']);
	}



  	function setFormEdit(){

	   $cek ='';
		$cbid = $_REQUEST[$this->Prefix.'_cb'];

		$this->form_fmST = 1;

		$fm = $this->setForm($cbid[0]);

		return	array ('cek'=>$cek.$fm['cek'], 'err'=>$fm['err'], 'content'=>$fm['content']);
	}

	function setForm($dt){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 700;
	 $this->form_height = 250;
	 $tgl_update = date('d-m-Y');
	  if ($this->form_fmST==0) {
		$this->form_caption = 'System - Baru';
		$id_system = $_REQUEST['filterSystem'];
		$id_modul = $_REQUEST['filterModul'];
		$id_sub_modul = $_REQUEST['filterSubModul'];
		$id_sub_sub_modul = $_REQUEST['filterSubSubModul'];
		$status = "1";

	  }else{
		$this->form_caption = 'System - Edit';
		$get = mysql_fetch_array(mysql_query("select * from $this->TblName where id ='$dt'"));
		foreach ($get as $key => $value) {
			  $$key = $value;
			}
	  }



	 $queryCmbSystem = "select id_system, nama from $this->TblName where id_system != '0' and id_modul = '0' and id_sub_modul = '0' and id_sub_sub_modul = '0' and id_sub_sub_sub_modul = '0'";
	 $comboSystem = cmbQuery('id_system',$id_system,$queryCmbSystem,"' onchange =$this->Prefix.systemChanged(); style='width:500px;'",'-- Pilih System --');

	 $queryCmbModul = "select id_modul, nama from $this->TblName where id_system = '$id_system' and id_modul != '0' and id_sub_modul = '0' and id_sub_sub_modul = '0' and id_sub_sub_sub_modul = '0'";
	 $comboModul = cmbQuery('id_modul',$id_modul,$queryCmbModul,"' onchange =$this->Prefix.modulChanged(); style='width:500px;' ",'-- Pilih Modul --');

	 $queryCmbSubModul = "select id_sub_modul, nama from $this->TblName where id_system = '$id_system' and id_modul = '$id_modul' and id_sub_modul != '0' and id_sub_sub_modul = '0' and id_sub_sub_sub_modul = '0'";
	 $comboSubModul = cmbQuery('id_sub_modul',$id_sub_modul,$queryCmbSubModul,"' onchange =$this->Prefix.subModulChanged(); style='width:500px;'",'-- Pilih Sub Modul --');

	 $queryCmbSubSubModul = "select id_sub_sub_modul, nama from $this->TblName where id_system = '$id_system' and id_modul = '$id_modul' and id_sub_modul = '$id_sub_modul' and id_sub_sub_modul != '0' and id_sub_sub_sub_modul = '0'";
	 $comboSubSubModul = cmbQuery('id_sub_sub_modul',$id_sub_sub_modul,$queryCmbSubSubModul," style='width:500px;' ",'-- Pilih Sub Sub Modul --');


       //items ----------------------
		  $this->form_fields = array(



			'system' => array(
						'label'=>'SYSTEM',
						'labelWidth'=>100,
						'value'=> $comboSystem."&nbsp <input type='button' onclick = $this->Prefix.newSystem(); value='Baru'>"
						),
			'modul' => array(
						'label'=>'MODUL',
						'labelWidth'=>100,
						'value'=> $comboModul."&nbsp <input type='button' onclick = $this->Prefix.newModul(); value='Baru'>"
						),
			'submodul' => array(
						'label'=>'SUB MODUL',
						'labelWidth'=>100,
						'value'=> $comboSubModul."&nbsp <input type='button' onclick = $this->Prefix.newSubModul(); value='Baru'>"
						),
			'subsubmodul' => array(
						'label'=>'SUB SUB MODUL',
						'labelWidth'=>100,
						'value'=> $comboSubSubModul."&nbsp <input type='button' onclick = $this->Prefix.newSubSubModul(); value='Baru'>"
						),

			'nama' => array(
						'label'=>'NAMA',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='nama' id='nama' value='".$nama."' style='width:500px;'>",
						 ),


			'title' => array(
						'label'=>'TITLE',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='title' id='title' value='".$title."' style='width:500px;'>",
						 ),

			'alamat_url' => array(
						'label'=>'URL',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='url' id='url' value='".$url."' style='width:500px;'>",
						 ),

			'hint' => array(
						'label'=>'HINT',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='hint' id='hint' value='$hint' style='width:500px;'>",
						 ),

			'status' => array(
						'label'=>'STATUS',
						'labelWidth'=>100,
						'value'=>cmbArray('status',$status,$this->Status,'-- PILIH --','style="width:95px;"'),
						 ),


			);
		//tombol
		$this->form_menubawah =

			"<input type='hidden' name='idEdit' id='idEdit' value='$dt'><input type='button' value='Simpan' onclick ='".$this->Prefix.".Simpan()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}


	function tontonVideoReward(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 200;
	 $this->form_caption = 'TONTON VIDEO REWARD';

	 	$get = mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'TONTON VIDEO' "));
		$minimal = $get['minimal'];
		$maksimal = $get['maksimal'];
		$limit = $get['limit_iklan'];
		$delay = $get['delay_iklan'];
		$notice = $get['notice_iklan'];

       //items ----------------------
		  $this->form_fields = array(



			'row' => array(
							'label'=>'MIMINAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='minimal' id='minimal' maxlength='3' value='$minimal' style='width:30px;maxlength='3'>
							",
						),
			'kolom' => array(
							'label'=>'MAKSIMAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='maksimal' id='maksimal' maxlength='3' value='$maksimal' style='width:30px;maxlength='3'>
							",
						),
	'limit' => array(
					'label'=>'LIMIT',
					'labelWidth'=>100,
					'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='limit' id='limit' maxlength='3' value='$limit' style='width:30px;maxlength='3'>
					",
				),
				'delay' => array(
								'label'=>'DELAY',
								'labelWidth'=>100,
								'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='delay' id='delay' maxlength='3' value='$delay' style='width:30px;maxlength='3'>
								",
							),
				'noticeError' => array(
								'label'=>'NOTICE',
								'labelWidth'=>100,
								'value'=>"<input type='text' name='notice' id='notice'  value='$notice' style='width:300px;' >
								",
							),



			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveTontonVideoReward()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function tontonVideoReward2(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 200;
	 $this->form_caption = 'TONTON VIDEO REWARD 2';

	 	$get = mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'TONTON VIDEO 2' "));
		$minimal = $get['minimal'];
		$maksimal = $get['maksimal'];
		$limit = $get['limit_iklan'];
		$delay = $get['delay_iklan'];
		$notice = $get['notice_iklan'];
       //items ----------------------
		  $this->form_fields = array(



			'row' => array(
							'label'=>'MIMINAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='minimal' id='minimal' maxlength='3' value='$minimal' style='width:30px;maxlength='3'>
							",
						),
			'kolom' => array(
							'label'=>'MAKSIMAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='maksimal' id='maksimal' maxlength='3' value='$maksimal' style='width:30px;maxlength='3'>
							",
						),
		'limit' => array(
						'label'=>'LIMIT',
						'labelWidth'=>100,
						'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='limit' id='limit' maxlength='3' value='$limit' style='width:30px;maxlength='3'>
						",
					),
					'delay' => array(
									'label'=>'DELAY',
									'labelWidth'=>100,
									'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='delay' id='delay' maxlength='3' value='$delay' style='width:30px;maxlength='3'>
									",
								),
					'noticeError' => array(
									'label'=>'NOTICE',
									'labelWidth'=>100,
									'value'=>"<input type='text' name='notice' id='notice'  value='$notice' style='width:300px;' >
									",
								),


			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveTontonVideoReward2()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function tontonVideoReward3(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 200;
	 $this->form_caption = 'TONTON VIDEO REWARD 3';

	 	$get = mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'TONTON VIDEO 3' "));
		$minimal = $get['minimal'];
		$maksimal = $get['maksimal'];
		$limit = $get['limit_iklan'];
		$delay = $get['delay_iklan'];
		$notice = $get['notice_iklan'];
       //items ----------------------
		  $this->form_fields = array(



			'row' => array(
							'label'=>'MIMINAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='minimal' id='minimal' maxlength='3' value='$minimal' style='width:30px;maxlength='3'>
							",
						),
			'kolom' => array(
							'label'=>'MAKSIMAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='maksimal' id='maksimal' maxlength='3' value='$maksimal' style='width:30px;maxlength='3'>
							",
						),
		'limit' => array(
						'label'=>'LIMIT',
						'labelWidth'=>100,
						'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='limit' id='limit' maxlength='3' value='$limit' style='width:30px;maxlength='3'>
						",
					),
					'delay' => array(
									'label'=>'DELAY',
									'labelWidth'=>100,
									'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='delay' id='delay' maxlength='3' value='$delay' style='width:30px;maxlength='3'>
									",
								),
					'noticeError' => array(
									'label'=>'NOTICE',
									'labelWidth'=>100,
									'value'=>"<input type='text' name='notice' id='notice'  value='$notice' style='width:300px;' >
									",
								),


			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveTontonVideoReward3()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function absenReward(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 200;
	 $this->form_height = 100;
	 $this->form_caption = 'TONTON VIDEO REWARD 2';

	 	$get = mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'ABSEN HARIAN' "));
		$minimal = $get['minimal'];
		$maksimal = $get['maksimal'];

       //items ----------------------
		  $this->form_fields = array(



			'row' => array(
							'label'=>'MIMINAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='minimal' id='minimal' maxlength='3' value='$minimal' style='width:30px;maxlength='3'>
							",
						),
			'kolom' => array(
							'label'=>'MAKSIMAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='maksimal' id='maksimal' maxlength='3' value='$maksimal' style='width:30px;maxlength='3'>
							",
						),




			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveAbsenReward()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function bonusIklan(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 200;
	 $this->form_caption = 'BONUS IKLAN';

	 	$get = mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'BONUS IKLAN' "));
		$minimal = $get['minimal'];
		$maksimal = $get['maksimal'];
		$limit = $get['limit_iklan'];
		$delay = $get['delay_iklan'];
		$notice = $get['notice_iklan'];

       //items ----------------------
		  $this->form_fields = array(



			'row' => array(
							'label'=>'MIMINAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='minimal' id='minimal' maxlength='3' value='$minimal' style='width:30px;maxlength='3'>
							",
						),
			'kolom' => array(
							'label'=>'MAKSIMAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='maksimal' id='maksimal' maxlength='3' value='$maksimal' style='width:30px;maxlength='3'>
							",
						),
			'limit' => array(
							'label'=>'LIMIT',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='limit' id='limit' maxlength='3' value='$limit' style='width:30px;maxlength='3'>
							",
						),
			'delay' => array(
							'label'=>'DELAY',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='delay' id='delay' maxlength='3' value='$delay' style='width:30px;maxlength='3'>
							",
						),
			'noticeError' => array(
							'label'=>'NOTICE',
							'labelWidth'=>100,
							'value'=>"<input type='text' name='notice' id='notice'  value='$notice' style='width:300px;' >
							",
						),


			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveBonusIklan()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function bonusIklan2(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 200;
	 $this->form_caption = 'BONUS IKLAN 2';

	 	$get = mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'BONUS IKLAN 2' "));
		$minimal = $get['minimal'];
		$maksimal = $get['maksimal'];
		$limit = $get['limit_iklan'];
		$delay = $get['delay_iklan'];
		$notice = $get['notice_iklan'];

       //items ----------------------
		  $this->form_fields = array(



			'row' => array(
							'label'=>'MIMINAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='minimal' id='minimal' maxlength='3' value='$minimal' style='width:30px;maxlength='3'>
							",
						),
			'kolom' => array(
							'label'=>'MAKSIMAL',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='maksimal' id='maksimal' maxlength='3' value='$maksimal' style='width:30px;maxlength='3'>
							",
						),
			'limit' => array(
							'label'=>'LIMIT',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='limit' id='limit' maxlength='3' value='$limit' style='width:30px;maxlength='3'>
							",
						),
			'delay' => array(
							'label'=>'DELAY',
							'labelWidth'=>100,
							'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='delay' id='delay' maxlength='3' value='$delay' style='width:30px;maxlength='3'>
							",
						),
			'noticeError' => array(
							'label'=>'NOTICE',
							'labelWidth'=>100,
							'value'=>"<input type='text' name='notice' id='notice'  value='$notice' style='width:300px;' >
							",
						),


			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveBonusIklan2()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}


	function editSiteTitle(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 300;
	 $this->form_height = 80;
	 $this->form_caption = 'SITE TITLE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='site_title'"));
		$siteTitle = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'SITE TITLE',
							'labelWidth'=>80,
							'value'=>"<input type='text' id='siteTitle' name='siteTitle' value='$siteTitle'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveSiteTitle()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

function editFontStyle(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 300;
	 $this->form_height = 80;
	 $this->form_caption = 'FONT HEADER';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='font_style'"));
		$fontStyle = $get['option_value'];
		  $this->form_fields = array(



			'title' => array(
							'label'=>'FONT HEADER',
							'labelWidth'=>100,
							'value'=>"<input type='text' id='fontStyle' name='fontStyle' style='cursor:pointer;' value='$fontStyle'>
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveFontStyle()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
function editContentJenisFont(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 300;
	 $this->form_height = 80;
	 $this->form_caption = 'FONT STYLE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='content_font_style'"));
		$fontStyle = $get['option_value'];
		  $this->form_fields = array(



			'title' => array(
							'label'=>'FONT STYLE',
							'labelWidth'=>80,
							'value'=>"<input type='text' id='fontStyle' name='fontStyle' style='cursor:pointer;' value='$fontStyle'>
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveContentJenisFont()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editFontMenubar(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 300;
	 $this->form_height = 80;
	 $this->form_caption = 'FONT MENU BAR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='font_menu_bar'"));
		$fontMenubar = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'FONT MENU BAR',
							'labelWidth'=>110,
							'value'=>"<input type='text' id='fontMenubar' name='fontMenubar' style='cursor:pointer;' value='$fontMenubar'>
							",
						),

			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveFontMenubar()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editCopyRightText(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 300;
	 $this->form_height = 80;
	 $this->form_caption = 'COPYRIGHT TEXT';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='copyright_title'"));
		$copyrightTitle = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'COPYRIGHT TEXT',
							'labelWidth'=>140,
							'value'=>"<input type='text' id='copyrightTitle' name='copyrightTitle' value='$copyrightTitle'>
							",
						),

			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveCopyright()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editFooterFontSize(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 300;
	 $this->form_height = 80;
	 $this->form_caption = 'FOOTER FONT SIZE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='footer_font_size'"));
		$footerFontSize = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'FOOTER FONT SIZE',
							'labelWidth'=>150,
							'value'=>"<input type='number' id='footerFontSize' name='footerFontSize' value='$footerFontSize'>
							",
						),

			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveFooterFontSize()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editFooterText(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 300;
	 $this->form_height = 80;
	 $this->form_caption = 'FOOTER TEXT';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='footer_text'"));
		$footerText = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'FOOTER TEXT',
							'labelWidth'=>110,
							'value'=>"<input type='text' id='footerText' name='footerText' value='$footerText'>
							",
						),

			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveFooter()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeaderTitle(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'HEADER TITLE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='header_title'"));
		$headerTitle = $get['option_value'];
		  $this->form_fields = array(



			'title' => array(
							'label'=>'HEADER TITLE',
							'labelWidth'=>100,
							'value'=>"<input type='text' id='headerTitle' name='headerTitle' value='$headerTitle' style='width:250px;'>
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeaderTitle()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeightHeader(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'HEADER HEIGHT';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='header_height'"));
		$headerHeight = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'HEADER HEIGHT',
							'labelWidth'=>100,
							'value'=>"<input type='number' id='headerHeight' name='headerHeight' value='$headerHeight'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeightHeader()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeaderFontSize(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'HEADER FONT SIZE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='header_font_size'"));
		$headerFontSize = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'HEADER FONT SIZE',
							'labelWidth'=>150,
							'value'=>"<input type='number' id='headerFontSize' name='headerFontSize' value='$headerFontSize'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeaderFontSize()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeightLogo(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'LOGO HEIGHT';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='height_logo'"));
		$logoHeight = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'LOGO HEIGHT',
							'labelWidth'=>100,
							'value'=>"<input type='number' id='logoHeight' name='logoHeight' value='$logoHeight'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeightLogo()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeightMenubar(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'HEIGHT MENU BAR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='height_menubar'"));
		$heightMenubar = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'HEIGHT MENU BAR',
							'labelWidth'=>150,
							'value'=>"<input type='number' id='heightMenubar' name='heightMenubar' value='$heightMenubar'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeightMenubar()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editMenubarFontSize(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'MENU BAR FONT SIZE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='menubar_font_size'"));
		$menubarFontSize = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'MENU BAR FONT SIZE',
							'labelWidth'=>150,
							'value'=>"<input type='number' id='menubarFontSize' name='menubarFontSize' value='$menubarFontSize'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveMenubarFontSize()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editDropdownFontSize(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'DROPDOWN FONT SIZE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='dropdown_font_size'"));
		$dropdownFontSize = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'DROPDOWN FONT SIZE',
							'labelWidth'=>150,
							'value'=>"<input type='number' id='dropdownFontSize' name='dropdownFontSize' value='$dropdownFontSize'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveDropdownFontSize()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editWidthLogo(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'LOGO WIDTH';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='width_logo'"));
		$logoWidth = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'LOGO WIDTH',
							'labelWidth'=>100,
							'value'=>"<input type='number' id='logoWidth' name='logoWidth' value='$logoWidth'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveWidthLogo()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editMenuBarVisible(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'MENU BAR VISIBLE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='show_menu_bar'"));
		$menuBarVisible = $get['option_value'];

		  $this->form_fields = array(



			'title' => array(
							'label'=>'BACKGROUND STATUS',
							'labelWidth'=>150,
							'value'=>cmbArray('menuBarVisible',$menuBarVisible,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveMenuBarVisible()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function tontonVideoStatus(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'TONTON VIDEO';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where fitur_name='TONTON VIDEO'"));
		$tontonVideoStatus = $get['status'];

		  $this->form_fields = array(



			'title' => array(
							'label'=> 'STATUS',
							'labelWidth'=>150,
							'value'=>cmbArray('tontonVideoStatus',$tontonVideoStatus,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveTontonVideoStatus()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function absenHarian(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'ABSEN HARIAN';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where fitur_name='ABSEN'"));
		$absenHarianStatus = $get['status'];

		  $this->form_fields = array(



			'title' => array(
							'label'=> 'STATUS',
							'labelWidth'=>150,
							'value'=>cmbArray('absenHarianStatus',$absenHarianStatus,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveAbsenHarian()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function bonusIklanStatus(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'BONUS IKLAN STATUS';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where fitur_name='BONUS IKLAN'"));
		$bonusIklanStatus = $get['status'];

		  $this->form_fields = array(



			'title' => array(
							'label'=> 'STATUS',
							'labelWidth'=>150,
							'value'=>cmbArray('bonusIklanStatus',$bonusIklanStatus,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveBonusIklanStatus()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function bonusIklanStatus2(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'BONUS IKLAN STATUS';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where fitur_name='BONUS IKLAN 2'"));
		$bonusIklanStatus = $get['status'];

		  $this->form_fields = array(



			'title' => array(
							'label'=> 'STATUS',
							'labelWidth'=>150,
							'value'=>cmbArray('bonusIklanStatus',$bonusIklanStatus,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveBonusIklanStatus2()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function tontonVideoStatus2(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'TONTON VIDEO 2';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where fitur_name='TONTON VIDEO 2'"));
		$tontonVideoStatus2 = $get['status'];

		  $this->form_fields = array(



			'title' => array(
							'label'=> 'STATUS',
							'labelWidth'=>150,
							'value'=>cmbArray('tontonVideoStatus2',$tontonVideoStatus2,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveTontonVideoStatus2()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function tontonVideoStatus3(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'TONTON VIDEO 3';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where fitur_name='TONTON VIDEO 3'"));
		$tontonVideoStatus3 = $get['status'];

		  $this->form_fields = array(



			'title' => array(
							'label'=> 'STATUS',
							'labelWidth'=>150,
							'value'=>cmbArray('tontonVideoStatus3',$tontonVideoStatus3,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveTontonVideoStatus3()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function editContentBackGroundActive(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'CONTENT BACKGROUND ACTIVE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='content_background_active'"));
		$backgroundStatus = $get['option_value'];
		$Status = array(
						array('COLOR' , "COLOR"),
						array('IMAGE' , "IMAGE"),
		);
		  $this->form_fields = array(



			'title' => array(
							'label'=>'BACKGROUND ACTIVE',
							'labelWidth'=>150,
							'value'=>cmbArray('backgroundStatus',$backgroundStatus,$Status,'-- PILIH --','style="width:95px;"')
							,
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveContentBackgroudActive()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function editDateVisible(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'DATE VISIBLE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='date_visible'"));
		$dateVisible = $get['option_value'];

		  $this->form_fields = array(
			'title' => array(
							'label'=>'DATE VISIBLE',
							'labelWidth'=>150,
							'value'=>cmbArray('dateVisible',$dateVisible,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveDateVisible()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function editCopyRightVisible(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'COPYRIGHT VISIBLE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='copyright_visible'"));
		$copyrightVisible = $get['option_value'];

		  $this->form_fields = array(
			'title' => array(
							'label'=>'COPYRIGHT VISIBLE',
							'labelWidth'=>150,
							'value'=>cmbArray('copyrightVisible',$copyrightVisible,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveCopyrightVisible()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editFooterVisible(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'FOOTER VISIBLE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='footer_visible'"));
		$footerVisible = $get['option_value'];

		  $this->form_fields = array(
			'title' => array(
							'label'=>'FOOTER VISIBLE',
							'labelWidth'=>150,
							'value'=>cmbArray('footerVisible',$footerVisible,$this->arrayVisible,'-- PILIH --','style="width:95px;"')
							,
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveFooterVisible()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeaderLogo(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 180;
	 $this->form_height = 210;
	 $this->form_caption = 'HEADER LOGO';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='header_logo'"));
		$headerLogo = $get['option_value'];
		$getDetailImage = mysql_fetch_array(mysql_query("select * from images where id ='$headerLogo'"));
		$getKategoriImage = mysql_fetch_array(mysql_query("select * from images_kategori where id ='".$getDetailImage['kategori']."'"));
		 $fileLocation = "Media/images/".$getKategoriImage['nama']."/".$getDetailImage['directory'];
		 $this->form_fields = array(



			'title' => array(
							'label'=>'HEADER TITLE',
							'labelWidth'=>100,
							'type'=>'merge',
							'value'=>"<img src='$fileLocation' id='imageView' name ='imageView' style='width:150px;height:150px;'></img><br><br><input type='button' value='GANTI' onclick=$this->Prefix.findImage();> <input type='hidden' id='headerLogo' name='headerLogo' value='$headerLogo' >
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeaderLogo()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editFooterImage(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 180;
	 $this->form_height = 210;
	 $this->form_caption = 'FOOTER IMAGE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='footer_image'"));
		$footerImage = $get['option_value'];
		$getDetailImage = mysql_fetch_array(mysql_query("select * from images where id ='$footerImage'"));
		$getKategoriImage = mysql_fetch_array(mysql_query("select * from images_kategori where id ='".$getDetailImage['kategori']."'"));
		 $fileLocation = "Media/images/".$getKategoriImage['nama']."/".$getDetailImage['directory'];
		 $this->form_fields = array(
			'title' => array(
							'label'=>'FOOTER IMAGE',
							'labelWidth'=>100,
							'type'=>'merge',
							'value'=>"<img src='$fileLocation' id='imageView' name ='imageView' style='width:150px;height:150px;'></img><br><br><input type='button' value='GANTI' onclick=$this->Prefix.findFooterImage();> <input type='hidden' id='footerImage' name='footerImage' value='$footerImage' >
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveFooterImage()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeaderImage(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 180;
	 $this->form_height = 210;
	 $this->form_caption = 'HEADER IMAGE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='header_image'"));
		$headerImage = $get['option_value'];
		$getDetailImage = mysql_fetch_array(mysql_query("select * from images where id ='$headerImage'"));
		$getKategoriImage = mysql_fetch_array(mysql_query("select * from images_kategori where id ='".$getDetailImage['kategori']."'"));
		 $fileLocation = "Media/images/".$getKategoriImage['nama']."/".$getDetailImage['directory'];
		 $this->form_fields = array(

			'title' => array(
							'label'=>'HEADER IMAGE',
							'labelWidth'=>100,
							'type'=>'merge',
							'value'=>"<img src='$fileLocation' id='imageView' name ='imageView' style='width:150px;height:150px;'></img><br><br><input type='button' value='GANTI' onclick=$this->Prefix.findHeaderImage();> <input type='hidden' id='headerImage' name='headerImage' value='$headerImage' >
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeaderImage()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editSiteImage(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 180;
	 $this->form_height = 210;
	 $this->form_caption = 'SITE IMAGE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='site_image'"));
		$siteImage = $get['option_value'];
		$getDetailImage = mysql_fetch_array(mysql_query("select * from images where id ='$siteImage'"));
		$getKategoriImage = mysql_fetch_array(mysql_query("select * from images_kategori where id ='".$getDetailImage['kategori']."'"));
		 $fileLocation = "Media/images/".$getKategoriImage['nama']."/".$getDetailImage['directory'];
		 $this->form_fields = array(



			'title' => array(
							'label'=>'HEADER TITLE',
							'labelWidth'=>100,
							'type'=>'merge',
							'value'=>"<img src='$fileLocation' id='imageView' name ='imageView' style='width:150px;height:150px;'></img><br><br><input type='button' value='GANTI' onclick=$this->Prefix.findSiteImage();> <input type='hidden' id='siteImage' name='siteImage' value='$siteImage' >
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveSiteImages()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}
	function editContentImage(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 180;
	 $this->form_height = 210;
	 $this->form_caption = 'CONTENT IMAGE';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='content_image'"));
		$contentImage = $get['option_value'];
		$getDetailImage = mysql_fetch_array(mysql_query("select * from images where id ='$contentImage'"));
		$getKategoriImage = mysql_fetch_array(mysql_query("select * from images_kategori where id ='".$getDetailImage['kategori']."'"));
		 $fileLocation = "Media/images/".$getKategoriImage['nama']."/".$getDetailImage['directory'];
		 $this->form_fields = array(



			'title' => array(
							'label'=>'HEADER TITLE',
							'labelWidth'=>100,
							'type'=>'merge',
							'value'=>"<img src='$fileLocation' id='imageView' name ='imageView' style='width:150px;height:150px;'></img><br><br><input type='button' value='GANTI' onclick=$this->Prefix.findContentImage();> <input type='hidden' id='contentImage' name='contentImage' value='$contentImage' >
							",
						),

			);
		//tombol
		$this->form_menubawah =
			"<input type='button' value='Hapus' onclick ='".$this->Prefix.".hapusContentImage()' title='Hapus' >"."&nbsp&nbsp".
			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveContentImage()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function editHeaderColor(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'HEADER COLOR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='header_color'"));
		$headerColor = $get['option_value'];
		  $this->form_fields = array(



			'title' => array(
							'label'=>'HEADER COLOR',
							'labelWidth'=>100,
							'value'=>"<input   id='headerColor' name='headerColor' value='$headerColor' style='width:250px;'>
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeaderColor()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$headerColor, 'err'=>$err, 'content'=>$content);
	}


	function editDropDownBackGroundColor(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'DROP DOWN BACKGROUND COLOR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='dropdown_background_color'"));
		$dropDownColor = $get['option_value'];
		  $this->form_fields = array(



			'title' => array(
							'label'=>'HEADER COLOR',
							'labelWidth'=>100,
							'value'=>"<input   id='dropDownColor' name='dropDownColor' value='$dropDownColor' style='width:250px;'>
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveDropDownBackGroundColor()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$headerColor, 'err'=>$err, 'content'=>$content);
	}

	function editHeaderTextColor(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'HEADER TEXT COLOR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='header_text_color'"));
		$headerTextColor = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'HEADER TEXT COLOR',
							'labelWidth'=>150,
							'value'=>"<input   id='headerTextColor' name='headerTextColor' value='$headerTextColor' style='width:250px;'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveHeaderTextColor()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$headerColor, 'err'=>$err, 'content'=>$content);
	}

	function editCopyRightColor(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'COPYRIGHT COLOR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='copyright_color'"));
		$copyrightColor = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'COPYRIGHT COLOR',
							'labelWidth'=>150,
							'value'=>"<input   id='copyrightColor' name='copyrightColor' value='$copyrightColor' style='width:250px;'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveCopyrightColor()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$headerColor, 'err'=>$err, 'content'=>$content);
	}

	function editWarnaBackground(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'CONTENT BACKGROUND COLOR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='background_content'"));
		$warnaBackground = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'CONTENT BACKGROUND COLOR',
							'labelWidth'=>200,
							'value'=>"<input   id='warnaBackground' name='warnaBackground' value='$warnaBackground' style='width:250px;'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveWarnaBackground()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$headerColor, 'err'=>$err, 'content'=>$content);
	}

	function editMenuBarColor(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'MENU BAR COLOR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='menu_bar_color'"));
		$menuColor = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'MENU COLOR',
							'labelWidth'=>100,
							'value'=>"<input   id='menuColor' name='menuColor' value='$menuColor' style='width:250px;'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveMenuBarColor()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$menuColor, 'err'=>$err, 'content'=>$content);
	}

	function editColorTextMenubar(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'COLOR TEXT MENU BAR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='font_color_menubar'"));
		$colorTextMenubar = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'COLOR TEXT MENU BAR',
							'labelWidth'=>150,
							'value'=>"<input   id='colorTextMenubar' name='colorTextMenubar' value='$colorTextMenubar' style='width:250px;'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveColorTextMenubar()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$menuColor, 'err'=>$err, 'content'=>$content);
	}

	function editColorBorder(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'WARNA GARIS BAWAH';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='color_border_menubar'"));
		$colorBorder = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'WARNA GARIS BAWAH',
							'labelWidth'=>150,
							'value'=>"<input   id='colorBorder' name='colorBorder' value='$colorBorder' style='width:250px;'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveColorBorder()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$menuColor, 'err'=>$err, 'content'=>$content);
	}

	function editFooterColor(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'FOOTER COLOR';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='footer_color'"));
		$footerColor = $get['option_value'];
		  $this->form_fields = array(
			'title' => array(
							'label'=>'FOOTER COLOR',
							'labelWidth'=>100,
							'value'=>"<input   id='footerColor' name='footerColor' value='$footerColor' style='width:250px;'>
							",
						),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveFooterColor()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$menuColor, 'err'=>$err, 'content'=>$content);
	}

	function editSiteUrl(){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 400;
	 $this->form_height = 80;
	 $this->form_caption = 'SITE URL';

	 	$get = mysql_fetch_array(mysql_query("select * from $this->TblName where option_name='site_url'"));
		$siteUrl = $get['option_value'];
		  $this->form_fields = array(



			'title' => array(
							'label'=>'SITE URL',
							'labelWidth'=>80,
							'value'=>"<input type='text' id='siteUrl' name='siteUrl' value='$siteUrl' style='width:300px;'>
							",
						),





			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".saveSiteUrl()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";
		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}

	function setFormeditdata($dt){
	 global $SensusTmp ,$Main;
	 global $Main;
	 global $HTTP_COOKIE_VARS;
	 $uid = $HTTP_COOKIE_VARS['coID'];
	 $cek = ''; $err=''; $content='';
	 $json = TRUE;	//$ErrMsg = 'tes';
	 $form_name = $this->Prefix.'_form';
	 $this->form_width = 770;
	 $this->form_height = 370;
	 $tgl_update = date('d-m-Y');
	  if ($this->form_fmST==0) {
		$this->form_caption = 'System - Baru';
	  }else{
		$this->form_caption = 'System - Edit';
		$Id = $dt['id'];
	  }

		$id = $_REQUEST['Id_system'];
		$fmc = $_REQUEST['fmc'];
		$fmd = $_REQUEST['fmd'];
		$fme = $_REQUEST['fme'];
		$fme1 = $_REQUEST['fme1'];
		$gedung = $_REQUEST['gedung'];

	$akt=mysql_fetch_array(mysql_query("select nmfile_asli from gambar_upload where id_upload='".$dt['Id_menu']."'  and jns_upload='2'"));
	$pas=mysql_fetch_array(mysql_query("select nmfile_asli from gambar_upload where id_upload='".$dt['Id_menu']."'  and jns_upload='3'"));
	$datalevel=1;
	$datatipe=1;
	$datajenis=1;
	$dataposisi=1;
	$dataaktif=1;
	$kdx=$dt['kode'];
	$datasys=mysql_fetch_array(mysql_query("select nm_system from system where Id_system='".$dt['Id_system']."'"));
	$datamod=mysql_fetch_array(mysql_query("select nm_system,nm_modul from system_modul where Id_modul='".$dt['Id_modul']."'"));

				$l = substr($kdx, 0,2);
				$m = substr($kdx, 3,2);
				$n = substr($kdx, 6,2);

       //items ----------------------
		  $this->form_fields = array(

		  	'no_urut' => array(
						'label'=>'NO.URUT',
						'labelWidth'=>180,
						'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'name='nourut' id='nourut' maxlength='3' value='".$dt['no_urut']."' style='width:30px;maxlength='3'>",
						 ),

			'kode' => array(
						'label'=>'KODE',
						'labelWidth'=>100,
						'value'=>"<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'name='kode_x' id='kode_x' maxlength='2' value='$l' style='width:30px;maxlength='3'>&nbsp
						<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'name='kode_y' id='kode_y' maxlength='2' value='$m' style='width:30px;maxlength='3'>&nbsp
						<input type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'name='kode_z' id='kode_z' maxlength='2' value='$n' style='width:30px;maxlength='3'> * 01.02.03",
						 ),

			'level' => array(
						'label'=>'LEVEL',
						'labelWidth'=>100,
						'value'=>cmbArray('level',$dt['level'],$this->Level,'-- PILIH --','style="width:95px;"'),
						 ),

		  	'nm_system' => array(
						'label'=>'NAMA SYSTEM / MODUL',
						'labelWidth'=>120,
						'value'=>"
						<input type='hidden' name='id' value='".$dt['Id_modul']."' placeholder='Kode' size='5px' id='id' readonly>
						<input type='hidden' name='id_system' value='".$dt['Id_system']."' placeholder='Kode' size='5px' id='id_system' readonly>
						<input type='text' name='nm_system' value='".$datasys['nm_system']."' placeholder='Nama System' style='width:245px' id='nm_system' readonly>&nbsp
						<input type='text' name='nm_modul' value='".$datamod['nm_modul']."' placeholder='Nama Modul' style='width:250px' id='nm_modul' readonly>&nbsp
						<input type='button' value='Cari' onclick ='".$this->Prefix.".Cari()' title='Cari' >"
									 ),

			'title' => array(
						'label'=>'TITLE',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='title' id='title' value='".$dt['title']."' style='width:500px;'>",
						 ),

			'alamat_url' => array(
						'label'=>'ALAMAT URL',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='alamat_url' id='alamat_url' value='".$dt['alamat_url']."' style='width:500px;'>",
						 ),

			'hint' => array(
						'label'=>'HINT',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='hint' id='hint' value='".$dt['hint']."' style='width:500px;'>",
						 ),

			'AKTIF' => array(
						'label'=>'FILE IMAGES AKTIF','labelWidth'=>150,
						'value'=>$akt['nmfile_asli'],
			 ),

			'PASIF' => array(
						'label'=>'FILE IMAGES PASIF','labelWidth'=>150,
						'value'=>$pas['nmfile_asli'],
			 ),


			'type_link' => array(
						'label'=>'TIPE LINK',
						'labelWidth'=>100,
						'value'=>cmbArray('typelink',$dt['type_link'],$this->Typelink,'-- PILIH --','style="width:95px;"'),
						 ),

			'jenis' => array(
						'label'=>'JENIS',
						'labelWidth'=>100,
						'value'=>cmbArray('jenis',$dt['jenis'],$this->Jenis,'-- PILIH --','style="width:95px;"'),
						 ),

			'posisi' => array(
						'label'=>'POSISI',
						'labelWidth'=>100,
						'value'=>cmbArray('posisi',$dt['posisi'],$this->Posisi,'-- PILIH --','style="width:95px;"'),
						 ),

			'status' => array(
						'label'=>'STATUS',
						'labelWidth'=>100,
						'value'=>cmbArray('status',$dt['status_menu'],$this->Status,'-- PILIH --','style="width:95px;"'),
						 ),

			'tgl_update' =>	array(
						'label'=>'TANGGAL UPDATE',
						'name'=>'dokumensumber',
						'label-width'=>100,
						'value'=>"<input type='text' name='tgl_update' id='tgl_update' class='' value='$tgl_update' style='width:80px;'readonly />  ",
								),
			'username' => array(
						'label'=>'USER NAME',
						'labelWidth'=>100,
						'value'=>"<input type='text' name='username' id='username' value='$uid' style='width:250px;'readonly>",
						 ),
			);
		//tombol
		$this->form_menubawah =

			"<input type='button' value='Simpan' onclick ='".$this->Prefix.".Simpan()' title='Simpan' >"."&nbsp&nbsp".
			"<input type='button' value='Batal' onclick ='".$this->Prefix.".Close()' >";

		$form = $this->genForm();
		$content = $form;//$content = 'content';
		return	array ('cek'=>$cek, 'err'=>$err, 'content'=>$content);
	}





	//daftar =================================
	function setKolomHeader($Mode=1, $Checkbox=''){
	$NomorColSpan = $Mode==1? 2: 1;
	 $headerTable =
	  "<thead>
	   <tr>
  	   <th class='th01' width='5' >No.</th>
  	   $Checkbox
	   <th class='th01' width='50' align='center'>KODE</th>
	   <th class='th01' width='500' align='center'>NAMA</th>
	   <th class='th01' width='200' align='center'>TITLE</th>
	   <th class='th01' width='200' align='center'>HINT</th>
	   <th class='th01' width='200' align='center'>URL</th>
	   <th class='th01' width='50' align='center'>STATUS</th>

	    </tr>
	   </thead>";

		return $headerTable;
	}

	function setKolomData($no, $isi, $Mode, $TampilCheckBox){
	 global $Ref;
	 foreach ($isi as $key => $value) {
			  $$key = $value;
			}
	 $Koloms = array();
	 $Koloms[] = array('align="center"', $no.'.' );
	  if ($Mode == 1) $Koloms[] = array(" align='center' ", $TampilCheckBox);
	 $Koloms[] = array('align="center"',$id_system.".".$id_modul.".".$id_sub_modul.".".$id_sub_sub_modul.".".$id_sub_sub_sub_modul);
	 if($id_sub_sub_sub_modul != '0' ){
	 	$margin = "<span style='margin-left:40px;'>";
	 }elseif($id_sub_sub_modul != '0' ){
	 	$margin = "<span style='margin-left:30px;'>";
	 }elseif($id_sub_modul != '0' ){
	 	$margin = "<span style='margin-left:20px;'>";
	 }elseif($id_modul != '0' ){
	 	$margin = "<span style='margin-left:10px;'>";
	 }
	 $Koloms[] = array('align="left"',$margin.$nama);
	 $Koloms[] = array('align="left"',$margin.$title);
	 $Koloms[] = array('align="left"',$margin.$hint);
	 $Koloms[] = array('align="left"',$url);

	 if($status == "1"){
	 	$status = "AKTIF";
	 }else{
	 	$status = "TIDAK AKTIF";
	 }
	 $Koloms[] = array('align="center"',$status);


	 return $Koloms;
	}


	function genDaftarOpsi(){
	 global $Ref, $Main;
	 $getTontonVideo = mysql_fetch_array(mysql_query("select * from fitur where fitur_name='TONTON VIDEO'"));
	 if($getTontonVideo['status'] == '1'){
		 $tontonVideoStatus = "AKTIF";
	 }else{
		 $tontonVideoStatus = "TIDAK AKTIF";
	 }
	 $getTontonVideo2 = mysql_fetch_array(mysql_query("select * from fitur where fitur_name='TONTON VIDEO 2'"));
	 if($getTontonVideo2['status'] == '1'){
		 $tontonVideoStatus2 = "AKTIF";
	 }else{
		 $tontonVideoStatus2 = "TIDAK AKTIF";
	 }
	 $getTontonVideo3 = mysql_fetch_array(mysql_query("select * from fitur where fitur_name='TONTON VIDEO 3'"));
	 if($getTontonVideo3['status'] == '1'){
		 $tontonVideoStatus3 = "AKTIF";
	 }else{
		 $tontonVideoStatus3 = "TIDAK AKTIF";
	 }
	 $getAbsenHarian = mysql_fetch_array(mysql_query("select * from fitur where fitur_name='ABSEN'"));
	 if($getAbsenHarian['status'] == '1'){
		 $absenHarian = "AKTIF";
	 }else{
		 $absenHarian = "TIDAK AKTIF";
	 }
	 $getBonusIklan = mysql_fetch_array(mysql_query("select * from fitur where fitur_name='BONUS IKLAN'"));
	 if($getBonusIklan['status'] == '1'){
		 $bonusIklanStatus = "AKTIF";
	 }else{
		 $bonusIklanStatus = "TIDAK AKTIF";
	 }
	 $getBonusIklan2 = mysql_fetch_array(mysql_query("select * from fitur where fitur_name='BONUS IKLAN 2'"));
	 if($getBonusIklan2['status'] == '1'){
		 $bonusIklanStatus2 = "AKTIF";
	 }else{
		 $bonusIklanStatus2 = "TIDAK AKTIF";
	 }

	 $getTontonVideoReward = mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'TONTON VIDEO'"));
	 $tontonVideoRewardMinimal = $getTontonVideoReward['minimal'];
	 $tontonVideoRewardMaksimal = $getTontonVideoReward['maksimal'];

	 $getTontonVideoReward2= mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'TONTON VIDEO 2'"));
	 $tontonVideoRewardMinimal2 = $getTontonVideoReward2['minimal'];
	 $tontonVideoRewardMaksimal2 = $getTontonVideoReward2['maksimal'];

	 $getTontonVideoReward3= mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'TONTON VIDEO 3'"));
	 $tontonVideoRewardMinimal3 = $getTontonVideoReward3['minimal'];
	 $tontonVideoRewardMaksimal3 = $getTontonVideoReward3['maksimal'];

	 $getAbsenReward= mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'ABSEN HARIAN'"));
	 $absenRewardMinimal = $getAbsenReward['minimal'];
	 $absenRewardMaksimal = $getAbsenReward['maksimal'];

	 $getBonusIklan= mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'BONUS IKLAN'"));
	 $bonusIklanMinimum = $getBonusIklan['minimal'];
	 $bonusIklanMaksimal = $getBonusIklan['maksimal'];

	 $getBonusIklan2= mysql_fetch_array(mysql_query("select * from reward_point where jenis_iklan = 'BONUS IKLAN 2'"));
	 $bonusIklan2Minimum = $getBonusIklan2['minimal'];
	 $bonusIklan2Maksimal = $getBonusIklan2['maksimal'];


		$TampilOpt = "
				<link rel='stylesheet' type='text/css' href='assets/css/bootstrap.min.css'>
  			<script type='text/javascript' src='assets/js/jquery-3.2.1.min.js'></script>
  			<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
  			<style>
  				a{
  					color: red;
  				}
  			</style>



  			<table style='width:100%;' class='table table-hover'>
  				<h2 style='text-align:left;'>Fitur</h2>



  				<tr>
					<td width='20%'>
						<strong>TONTON VIDEO</strong>
					</td>
					<td width='80%'>
						".$tontonVideoStatus."
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.tontonVideoStatus() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>TONTON VIDEO 2</strong>
					</td>
					<td width='80%'>
						".$tontonVideoStatus2."
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.tontonVideoStatus2() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>TONTON VIDEO 3</strong>
					</td>
					<td width='80%'>
						".$tontonVideoStatus3."
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.tontonVideoStatus3() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>BONUS IKLAN</strong>
					</td>
					<td width='80%'>
						".$bonusIklanStatus."
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.bonusIklanStatus() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>BONUS IKLAN 2</strong>
					</td>
					<td width='80%'>
						".$bonusIklanStatus2."
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.bonusIklanStatus2() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>ABSEN HARIAN</strong>
					</td>
					<td width='80%'>
						".$absenHarian."
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.absenHarian() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>


  				<tr>
					<td width='20%'>
						<strong>TONTON VIDEO REWARD</strong>
					</td>
					<td width='80%'>
						$tontonVideoRewardMinimal - $tontonVideoRewardMaksimal
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.tontonVideoReward() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>
  				<tr>
					<td width='20%'>
						<strong>TONTON VIDEO REWARD 2</strong>
					</td>
					<td width='80%'>
						$tontonVideoRewardMinimal2 - $tontonVideoRewardMaksimal2
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.tontonVideoReward2() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>TONTON VIDEO REWARD 3</strong>
					</td>
					<td width='80%'>
						$tontonVideoRewardMinimal3 - $tontonVideoRewardMaksimal3
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.tontonVideoReward3() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>BONUS IKLAN</strong>
					</td>
					<td width='80%'>
						$bonusIklanMinimum - $bonusIklanMaksimal
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.bonusIklan() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>BONUS IKLAN 2</strong>
					</td>
					<td width='80%'>
						$bonusIklan2Minimum - $bonusIklan2Maksimal
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.bonusIklan2() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>

  				<tr>
					<td width='20%'>
						<strong>ABSEN REWARD</strong>
					</td>
					<td width='80%'>
						$absenRewardMinimal - $absenRewardMaksimal
					</td>
					<td  style='float:right;'>
						<a onclick=$this->Prefix.absenReward() style='cursor:pointer;' >Sunting</a>
					</td>
					</tr>




  			</table>



				";

			;
		return array('TampilOpt'=>$TampilOpt);
	}



	function genFormKB($withForm=TRUE, $params=NULL, $center=TRUE){
		$form_name = $this->Prefix.'_KBform';

		if($withForm){
			$form= "<form name='$form_name' id='$form_name' method='post' action=''>".
				createDialog(
					$form_name.'_div',
					$this->setForm_content(),
					$this->form_width,
					$this->form_height,
					$this->form_caption,
					'',
					$this->form_menubawah.
					"<input type='hidden' id='".$this->Prefix."_idplh' name='".$this->Prefix."_idplh' value='$this->form_idplh' >
					<input type='hidden' id='".$this->Prefix."_fmST' name='".$this->Prefix."_fmST' value='$this->form_fmST' >",
					$this->form_menu_bawah_height,'',$params).
				"</form>";

		}else{
			$form=
				createDialog(
					$form_name.'_div',
					$this->setForm_content(),
					$this->form_width,
					$this->form_height,
					$this->form_caption,
					'',
					$this->form_menubawah.
					"<input type='hidden' id='".$this->Prefix."_idplh' name='".$this->Prefix."_idplh' value='$this->form_idplh' >
					<input type='hidden' id='".$this->Prefix."_fmST' name='".$this->Prefix."_fmST' value='$this->form_fmST' >",
					$this->form_menu_bawah_height,'',$params
				);
		}

		if($center){
			$form = centerPage( $form );
		}
		return $form;
	}
}
$fitur = new fiturObj();
$fitur->username =$_COOKIE['coID'];
?>
