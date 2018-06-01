var fitur = new DaftarObj2({
	prefix : 'fitur',
	url : 'pages.php?Pg=fitur',
	formName : 'fiturForm',
	el_kode_urusan : '',
	el_nama_urusan: '',

	loading: function(){
		//alert('loading');
	//	this.topBarRender();
		this.filterRender();
		//this.daftarRender();
		//this.sumHalRender();
	/*	document.getElementById('headerVulnWalker').innerHTML = "";*/
	},

	Cari: function(){
		var me = this;
		ManagementModulSystem2.windowShow();
	},

	nyalakandatepicker: function(){

		$( ".datepicker" ).datepicker({
			dateFormat: "dd-mm-yy",
			showAnim: "slideDown",
			inline: true,
			showOn: "button",
			buttonImage: "datepicker/calender1.png",
			buttonImageOnly: true,
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+0",
			buttonText : "",
		});
	},

	detail: function(){
		//alert('detail');
		var me = this;
		errmsg = this.CekCheckbox();
		if(errmsg ==''){
			var box = this.GetCbxChecked();
		}else{
			alert(errmsg);
		}

	},


	daftarRender:function(){
		var me =this; //render daftar
		addCoverPage2(
			'daftar_cover',	1, 	true, true,	{renderTo: this.prefix+'_cont_daftar',
			imgsrc: 'images/wait.gif',
			style: {position:'absolute', top:'5', left:'5'}
			}
		);
		$.ajax({
		  	url: this.url+'&tipe=daftar',
		 	type:'POST',
			data:$('#'+this.formName).serialize(),
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				document.getElementById(me.prefix+'_cont_daftar').innerHTML = resp.content;
				me.sumHalRender();
				document.getElementById('headerVulnWalker').innerHTML = "";
		  	}
		});
	},

	Baru:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=formBaru',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
						document.getElementById(cover).innerHTML = resp.content;
						setTimeout(function myFunction() {ManagementSystem.nyalakandatepicker()},1000);
						me.uploadIni();
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	tontonVideoReward:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=tontonVideoReward',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	tontonVideoReward2:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=tontonVideoReward2',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	tontonVideoReward3:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=tontonVideoReward3',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	absenReward:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=absenReward',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	bonusIklan:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=bonusIklan',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	bonusIklan2:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=bonusIklan2',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},


	editFontStyle:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editFontStyle',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$('#fontStyle').fontselect();

					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	editContentJenisFont:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editContentJenisFont',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$('#fontStyle').fontselect();

					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editFontMenubar:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editFontMenubar',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$('#fontMenubar').fontselect();

					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editSiteTitle:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editSiteTitle',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editCopyRightText:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editCopyRightText',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editFooterFontSize:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editFooterFontSize',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editFooterText:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editFooterText',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeaderLogo:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeaderLogo',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editFooterImage:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editFooterImage',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeaderImage:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeaderImage',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},


	editSiteImage:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editSiteImage',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},


	editContentImage:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editContentImage',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},


	findImage:function(){
		popupImages.typeImage="headerLogo";
		popupImages.windowShow();
	},
	findSiteImage:function(){
		popupImages.typeImage="siteImage";
		popupImages.windowShow();
	},
	findContentImage:function(){
		popupImages.typeImage="contentImage";
		popupImages.windowShow();
	},
	findHeaderImage:function(){
		popupImages.typeImage="headerImage";
		popupImages.windowShow();
	},
	findFooterImage:function(){
		popupImages.typeImage="footerImage";
		popupImages.windowShow();
	},

	editHeaderColor:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeaderColor',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#headerColor").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},



	editDropDownBackGroundColor:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editDropDownBackGroundColor',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#dropDownColor").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeaderTextColor:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeaderTextColor',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#headerTextColor").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editCopyRightColor:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editCopyRightColor',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#copyrightColor").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editWarnaBackground:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editWarnaBackground',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#warnaBackground").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editMenuBarColor:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editMenuBarColor',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#menuColor").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editColorTextMenubar:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editColorTextMenubar',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#colorTextMenubar").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editColorBorder:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editColorBorder',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#colorBorder").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editFooterColor:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editFooterColor',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
						$("#footerColor").spectrum({
						    color: resp.cek,
						    showInput: true,
						    className: "full-spectrum",
						    showInitial: true,
						    showPalette: true,
						    showSelectionPalette: true,
						    maxSelectionSize: 10,
						    preferredFormat: "hex",
						    localStorageKey: "spectrum.demo",
						    move: function (color) {

						    },
						    show: function () {

						    },
						    beforeShow: function () {

						    },
						    hide: function () {

						    },
						    change: function() {

						    },
						    palette: [
						        ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
						        "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
						        ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
						        "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
						        ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
						        "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
						        "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
						        "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
						        "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
						        "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
						        "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
						        "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
						        "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
						        "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
						    ]
						});
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editSiteUrl:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editSiteUrl',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editMenuBarVisible:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editMenuBarVisible',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	absenHarian:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=absenHarian',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	bonusIklanStatus:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=bonusIklanStatus',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	bonusIklanStatus2:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=bonusIklanStatus2',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	tontonVideoStatus:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=tontonVideoStatus',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	tontonVideoStatus2:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=tontonVideoStatus2',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},
	tontonVideoStatus3:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=tontonVideoStatus3',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editContentBackGroundActive:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editContentBackGroundActive',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;

						$("#backgroundStatus option[value='']").remove();
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editDateVisible:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editDateVisible',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editCopyRightVisible:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editCopyRightVisible',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editFooterVisible:function(){
		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editFooterVisible',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeaderTitle:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeaderTitle',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeightHeader:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeightHeader',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeaderFontSize:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeaderFontSize',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeightLogo:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeightLogo',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editHeightMenubar:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editHeightMenubar',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editMenubarFontSize:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editMenubarFontSize',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editDropdownFontSize:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editDropdownFontSize',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	editWidthLogo:function(){

		var me = this;
		var cover = this.prefix+'_formcover';
			addCoverPage2(cover,1,true,false);
			document.body.style.overflow='hidden';
			$.ajax({
				type:'POST',
				data:$('#'+this.formName).serialize(),
				url: this.url+'&tipe=editWidthLogo',
			  	success: function(data) {
					var resp = eval('(' + data + ')');
					if (resp.err ==''){
 						document.getElementById(cover).innerHTML = resp.content;
					}else{
						alert(resp.err);
						delElem(cover);
						document.body.style.overflow='auto';
					}
			  	}
			});
	},

	saveSiteTitle: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveSiteTitle',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveTontonVideoReward: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveTontonVideoReward',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveTontonVideoReward2: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveTontonVideoReward2',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveTontonVideoReward3: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveTontonVideoReward3',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveAbsenReward: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveAbsenReward',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
 saveBonusIklan: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveBonusIklan',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();
				}else{
					alert(resp.err);
				}
		  	}
		});
	},
 saveBonusIklan2: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveBonusIklan2',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();
				}else{
					alert(resp.err);
				}
		  	}
		});
	},



	saveCopyright: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveCopyright',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveFontStyle: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveFontStyle',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveContentJenisFont: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveContentJenisFont',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveFontMenubar: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveFontMenubar',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveFooter: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveFooter',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveFooterFontSize: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveFooterFontSize',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);
				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveSiteUrl: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveSiteUrl',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},


	saveHeaderTitle: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeaderTitle',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeightHeader: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeightHeader',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeaderFontSize: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeaderFontSize',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeightLogo: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeightLogo',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeightMenubar: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeightMenubar',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveMenubarFontSize: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveMenubarFontSize',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveDropdownFontSize: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveDropdownFontSize',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveWidthLogo: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveWidthLogo',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveMenuBarVisible: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveMenuBarVisible',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveTontonVideoStatus: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveTontonVideoStatus',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveAbsenHarian: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveAbsenHarian',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveBonusIklanStatus: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveBonusIklanStatus',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveBonusIklanStatus2: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveBonusIklanStatus2',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveTontonVideoStatus2: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveTontonVideoStatus2',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveTontonVideoStatus3: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveTontonVideoStatus3',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},
	saveContentBackgroudActive: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveContentBackgroudActive',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveDateVisible: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveDateVisible',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveCopyrightVisible: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveCopyrightVisible',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveFooterVisible: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveFooterVisible',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeaderLogo: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeaderLogo',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveFooterImage: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveFooterImage',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeaderImage: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeaderImage',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveSiteImages: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveSiteImages',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveContentImage: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveContentImage',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	hapusContentImage: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=hapusContentImage',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeaderColor: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeaderColor',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},


	saveDropDownBackGroundColor: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveDropDownBackGroundColor',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveHeaderTextColor: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveHeaderTextColor',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveCopyrightColor: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveCopyrightColor',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveWarnaBackground: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveWarnaBackground',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},


	saveMenuBarColor: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveMenuBarColor',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveColorTextMenubar: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveColorTextMenubar',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveColorBorder: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveColorBorder',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	saveFooterColor: function(){
		var me= this;
		this.OnErrorClose = false
		document.body.style.overflow='hidden';
		var cover = this.prefix+'_formsimpan';
		addCoverPage2(cover,1,true,false);

		$.ajax({
			type:'POST',
			data:$('#'+this.prefix+'_form').serialize(),
			url: this.url+'&tipe=saveFooterColor',
		  	success: function(data) {
				var resp = eval('(' + data + ')');
				delElem(cover);


				if(resp.err==''){
						me.filterRender();
						me.Close();

				}else{
					alert(resp.err);
				}
		  	}
		});
	},

	imageAktifChanged: function(){
		var me= this;
		var filesSelected = document.getElementById("imageAktifFile").files;
		if (filesSelected.length > 0)
		{
			var fileToLoad = filesSelected[0];

			var fileReader = new FileReader();

			fileReader.onload = function(fileLoadedEvent)
			{
				var textAreaFileContents = document.getElementById
				(
					"baseImageAktif"
				);

				textAreaFileContents.value = fileLoadedEvent.target.result;
				$("#nameFileAktif").val(document.getElementById('imageAktifFile').value);
			};

			fileReader.readAsDataURL(fileToLoad);
		}
	},

	imagePasifChanged: function(){
		var me= this;
		var filesSelected = document.getElementById("imagePasifFile").files;
		if (filesSelected.length > 0)
		{
			var fileToLoad = filesSelected[0];

			var fileReader = new FileReader();

			fileReader.onload = function(fileLoadedEvent)
			{
				var textAreaFileContents = document.getElementById
				(
					"baseImagePasif"
				);

				textAreaFileContents.value = fileLoadedEvent.target.result;
				$("#nameFilePasif").val(document.getElementById('imagePasifFile').value);
			};

			fileReader.readAsDataURL(fileToLoad);
		}
	},
	Close2:function(){
		var cover = this.prefix+'_formcoverKB';
		if(document.getElementById(cover)) delElem(cover);
		if(tipe==null){
			document.body.style.overflow='auto';
		}
	},



});
