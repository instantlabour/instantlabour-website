<?php
if(isset($_POST["submit"])){
    $name=$_POST["Name"];
    $mobile=$_POST["Mobile"];
    $email=$_POST["Email"];
    $gender=$_POST["Gender"];
    $password=$_POST["pwd1"];
    $username=$_POST["username"];
    $conn=new mysqli("localhost","instuser","root","cdat");
    $conn->query("INSERT INTO signup1(name,mobile,email,gender,password,username) VALUES ('{$name}',{$mobile},'{$email}','{$gender}','{$password}','{$username}')");
   
}
?>

<?php
$target_dir = "C:/xampp/htdocs/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imgname = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $conn->query("UPDATE signup1 SET image = ('{$imgname}') WHERE username=('{$username}') ");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<head>
<meta charset="utf-8" />
<title>SignUp [Step 2] </title>

<!-- CSS -->
<link rel="stylesheet" href="/Content/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo:400,500,600,700">
<!-- MAIN/RESPONSIVE STYLE -->
<link href="/Content/css/main-1.0.6.css" rel="stylesheet"/>
<link href="/Content/css/responsive-1.0.6.css" rel="stylesheet"/>


<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
* { box-sizing: border-box; }
body {
  font: 16px Arial; 
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
</head>
<body class="ov-hidden ">


<form action="#" enctype="multipart/form-data" id="step3Form" method="post">

<input name="__RequestVerificationToken" type="hidden" value="pBSI-fUxXKO1_puWzMf80_LSxCgDrZEKSfZyHfcrYCKzk_gzuMVzhIPCdAGRtR2DzYrD8szaMjI4oLbywvVk8eoJHUmIw3Ga-T0z81dKP5c1" />    <!-- CONTENT -->
<div class="vertical-align">
    <div class="table">
        <div class="cell">
            <div class="wrapper signin set-margin-bottom">
                <span class="title">sign up</span>
                <div class="autocomplete" style="width:300px;">
    <input id="myInput" type="text" name="myCountry" placeholder="Select Your City">
  </div>
                <div class="rel hover-line select-dd">
                        
                        <select data-val="true" data-val-number="The field Experience must be a number." data-val-required="Please specify Experience" id="Experience" name="Experience"><option value="">Choose Experience in years</option>
<option selected="selected" value="0">Fresher</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">10+</option>
</select>
                        <span class="field-validation-valid" data-valmsg-for="Experience" data-valmsg-replace="true"></span>
                    </div>
                    <div class="rel common education">
                        <span class="title1">Education</span>
                        <div><input data-val="true" data-val-required="Please specify your Qualification" id="Qual1" name="Qualification" type="radio" value="Sslc" /> <label for="Qual1"><i>Upto 10th</i></label></div>
                        <div><input id="Qual2" name="Qualification" type="radio" value="Plus Two" /> <label for="Qual2"><i>Plus Two</i></label></div>
                        <div><input id="Qual3" name="Qualification" type="radio" value="Graduation" /> <label for="Qual3"><i>Graduate</i></label></div>
                        <div><input id="Qual4" name="Qualification" type="radio" value="Post Graduation" /> <label for="Qual4"><i>Post graduate & above</i></label></div>
                        <span class="field-validation-valid" data-valmsg-for="Qualification" data-valmsg-replace="true"></span>
                    </div>
                    
                <div class="rel hover-line"><input class="radio-insert" placeholder="Job title" type="text" readonly="readonly"><span class="field-validation-valid" data-valmsg-for="jobTitle" data-valmsg-replace="true"></span></div>
                <div id="scrollbar-container" class="row radio-row">
                    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                    <div class="viewport">
                        <div class="overview">
                                        <div class="col-sm-6"><input data-val="true" data-val-required="Please choose your job title" id="jobTitle" name="jobTitle" type="radio" value="162" /><span class="radio-span">Auto electrician</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="158" /><span class="radio-span">Autocad/Draftsmen</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="150" /><span class="radio-span">Aviation/Cabin Crew</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="122" /><span class="radio-span">Ayah/Home Nurse / Midwife</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="137" /><span class="radio-span">Ayurveda Therapist</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="119" /><span class="radio-span">Beautician</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="103" /><span class="radio-span">BPO/Call Centre- Malayalam</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="165" /><span class="radio-span">Carpenter</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="125" /><span class="radio-span">Cashier/Billing</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="189" /><span class="radio-span">CCTV Mechanic</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="166" /><span class="radio-span">Civil Supervisor/Foreman</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="96" /><span class="radio-span">Collection Agent</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="161" /><span class="radio-span">Computer hardware/Service</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="121" /><span class="radio-span">Cook</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="107" /><span class="radio-span">Data Entry Operator</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="93" /><span class="radio-span">Deliver/Courier Boy</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="98" /><span class="radio-span">Depot Worker/ Packer/ Despatch</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="134" /><span class="radio-span">Disabled/differently abled</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="100" /><span class="radio-span">Driver Heavy</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="101" /><span class="radio-span">Driver LMV</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="106" /><span class="radio-span">DTP Operator</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="114" /><span class="radio-span">Electrician</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="128" /><span class="radio-span">Fabrication</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="97" /><span class="radio-span">Factory Workman</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="171" /><span class="radio-span">Fitness/Gym Trainer</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="167" /><span class="radio-span">Fitter</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="105" /><span class="radio-span">Gardner</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="160" /><span class="radio-span">Graphic Designer/Video/Audio /</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="120" /><span class="radio-span">Hair Cutter</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="102" /><span class="radio-span">Heavy Machine Operator(JCB)</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="90" /><span class="radio-span">Helper / Caretaker</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="117" /><span class="radio-span">Hotel Supplier/Steward</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="86" /><span class="radio-span">House Keeping</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="88" /><span class="radio-span">House Maid/Servent</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="188" /><span class="radio-span">Iron man/laundry</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="139" /><span class="radio-span">Jewel Appraiser</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="194" /><span class="radio-span">Juice Maker</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="116" /><span class="radio-span">Kitchen Steward</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="143" /><span class="radio-span">Lab technician</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="169" /><span class="radio-span">Labour- Bengal, Assam, North E</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="92" /><span class="radio-span">Loading/Unloading/Helper</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="99" /><span class="radio-span">Machine Operator- Factory</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="180" /><span class="radio-span">Mason</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="113" /><span class="radio-span">Mechanic- Electrical</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="124" /><span class="radio-span">Mechanic- Others</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="131" /><span class="radio-span">Mechanic-Auto/Electrical</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="111" /><span class="radio-span">Mechanic-Electronics</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="110" /><span class="radio-span">Mechanic-Heavy</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="112" /><span class="radio-span">Mechanic-HVAC</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="109" /><span class="radio-span">Mechanic-LMV</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="132" /><span class="radio-span">Mechanic-Two Wheeler</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="172" /><span class="radio-span">Mobile Phone Technician</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="91" /><span class="radio-span">Office Boy/Peon/Attender</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="179" /><span class="radio-span">Operation Theater Technician</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="135" /><span class="radio-span">Painter</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="127" /><span class="radio-span">Petrol Pump Assistant</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="142" /><span class="radio-span">Pharmacist</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="115" /><span class="radio-span">Plumber</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="164" /><span class="radio-span">Printing &amp; Press Workers</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="156" /><span class="radio-span">Receptionist/Welcome Desk</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="191" /><span class="radio-span">Reservation/Ticketing Agent</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="195" /><span class="radio-span">Roofing works</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="94" /><span class="radio-span">Sales Boy</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="177" /><span class="radio-span">Sales Girl</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="95" /><span class="radio-span">Sales Man-Field</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="84" /><span class="radio-span">Security Gaurd</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="85" /><span class="radio-span">Security Supervisor</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="138" /><span class="radio-span">Spa Therapist</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="168" /><span class="radio-span">Store Keeper</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="186" /><span class="radio-span">Structural Fabrication</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="181" /><span class="radio-span">Surveyor</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="87" /><span class="radio-span">Sweeper- Home/Shop</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="118" /><span class="radio-span">Tailor/Fashion designer</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="104" /><span class="radio-span">Tele Caller</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="184" /><span class="radio-span">Therapist- Hijama/Acupuncture</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="173" /><span class="radio-span">Tiles /granites/interior worke</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="170" /><span class="radio-span">upholstery worker</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="140" /><span class="radio-span">Videographer/Photographer</span></div>
 <div class="clearfix"></div>                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="108" /><span class="radio-span">Welder</span></div>
                                        <div class="col-sm-6"><input id="jobTitle" name="jobTitle" type="radio" value="141" /><span class="radio-span">Xray Technician</span></div>

                    <div class="clearfix"></div>

               
             </div>
        
        </div>
    </div>
</div>
<div class="proceed"><input type="submit" value="Proceed" id="btn_sub"></div>
<div class="clearfix"></div>
</form>
<script>
var countries =["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thiruvananthapuram","Thrissur","Wayanad","Alappuzha","Arookutty","Aroor","Bharanikkavu","Chengannur","Chennithala","Cheppad","Cherthala","Chingoli","Ezhupunna","Haripad","Kandalloor","Kanjikkuzhi","Kannamangalam","Karthikappally","Kattanam","Kayamkulam","Keerikkad","Kodamthuruth","Kokkothamangalam","Komalapuram","Krishnapuram","Kumarapuram","Kurattissery","Kuthiathode","Mannanchery(Mannancherry)","Mannar","Mavelikkara","Muhamma","Muthukulam","Pallippuram","Pathirappally","Pathiyoor","Puthuppally","Thaikattussery","Thanneermukkam(Thanneermukkom)","Thazhakara","Vayalar","Alangad","Aluva","Amballur","Angamaly","Chelamattom","Chendamangalam","Chengamanad","Cheranallur","Choornikkara","Chowwara","Edathala","Elamkunnapuzha","Eloor","Eramalloor","Kadamakkudy","Kadungalloor","Kakkanad","Kalady","Kalamassery","Kanayannur","Karumalloor","Kizhakkumbhagom","Kochi[Cochin]","Koovappady","Kothamangalam","Kottuvally","Kumbalam","Kumbalangy","Kunnathunad","Kureekkad","Manakunnam","Maradu","Marampilly","Mattoor","Moothakunnam","Mulamthuruthy(Mulanthuruthy)","Mulavukad","Muvattupuzha","Nedumbassery","Njarackal","Paravur","Perumbavoor","Puthencruz","Puthenvelikkara","Puthuvype","Thekkumbhagom","Thiruvankulam","Thrippunithura","Vadakkekara","Vadakkumbhagom","Varappuzha","Vazhakkala","Vazhakulam","Velloorkunnam","Vengola","Thodupuzha","Ancharakandy(Anjarakkandy)","AzhikodeNorth","AzhikodeSouth","Chala","Cheleri","Chelora","Cherukunnu","Cheruthazham","Chirakkal","Chockli","Dharmadom","Elayavoor","Eranholi","Eruvatti(Eruvatty)","Ezhome","Irikkur","Iriveri","Kadachira","Kadannappalli","Kadirur","Kalliasseri","Kandamkunnu","Kanhirode","Kannadiparamba","Kannapuram","Kannur","KannurCantonment","Karivellur","Keezhallur","Kolacherry","Kolavelloor","Koodali","Koothuparamba(Kuthuparamba)","Kottayam-Malabar","Kunhimangalam","Kurumathur","Kuttiattoor","Madayi","Manantheri","Mangattidam","Maniyoor","Mattannur(Mattanur)","Mavilayi","Mayyil","Mokeri","Munderi","Muzhappilangad","Narath","NewMahe","Paduvilayi","Pallikkunnu","Panniyannur","Panoor","Pappinisseri","Pariyaram(Pilathara)","Pathiriyad","Pattiom","Payyannur(Payyanur)","Peralassery(Peralasseri)","Peringathur","Pinarayi","Puzhathi","Taliparamba","Thalassery","Thottada","Valapattanam","Varam","Ajanur","BangraManjeshwar","Bare","Chemnad","Chengala","Hosabettu","Kanhangad","Kasaragod","Keekan","Koipady","Kudlu","Kunjathur","Madhur","Mangalpady","Maniyat","Manjeshwar","Mogral","NorthThrikkaripur","Pallikkara","Perole","Pilicode","Puthur","Shiribagilu","Shiriya","SouthThrikkaripur","Udma","Uppala","Adichanalloor","Adinad","Ayanivelikulangara","Chavara","Elampalloor","Kallelibhagom","Karunagappally(Karunagappalli)","Kollam","Kottamkara","Kottarakkara","Kulasekharapuram","Mayyanad","Meenad","Nedumpana","Oachira","Panayam","Panmana","Paravoor(Paravur)","Perinad","Poothakkulam","Punalur","Thazhuthala","Thodiyoor","Thrikkadavoor","Thrikkaruva","Thrikkovilvattom","Vadakkumthala","Aimanam","Athirampuzha","Changanassery","ChengalamSouth","Chethipuzha","Erattupetta","Ettumanoor","Kottayam","Nattakam","Paippad","Palai","Panachikkad","Perumbaikad","Puthuppally","Thrikkodithanam","Vaikom","Vijayapuram","Atholi","Ayancheri","Azhiyur","Balusseri(Balussery)","Beypore","Chekkiad","Chelannur","Chemancheri","Cheruvannur","Chorode","Edacheri","Eramala","Eravattur","Feroke","Iringal","Kakkodi","Karuvanthuruthy","Keezhariyur","Koothali","Kottappally","Kozhikode[Calicut]","Kozhukkallur","Kunnamangalam","Kunnummal","Kuruvattur","Kuttikkattoor","Maniyur","Mavoor","Menhaniam","Meppayyur(Meppayur)","Nadapuram","Naduvannur","Nanmanda","Olavanna","Palayad","Panangad","Pantheeramkavu","Perumanna","Peruvayal","Poolacode","Quilandy(Koyilandy)","Ramanattukara","Thalakkulathur","Thazhecode","Thikkody(Thikkodi)","Thuneri","Thurayur","Ulliyeri","Vadakara(Vatakara)","Valayam","Villiappally","AbduRahimanNagar","Alamcode","Ariyallur","Chelambra(Idimuzhikkal)","Cheriyamundam(Ceriyamundam)","Cherukavu","Edappal(Edapal)","Irimbiliyam","Kalady","Kannamangalam","Kattipparuthi(Kattipparutti)","Kizhuparamba","Kodur","Kondotty","Koottilangadi","Kottakkal","Kuttippuram","Malappuram","Manjeri","Marancheri(Maranchery)","Moonniyur(Thalappara)","Naduvattom","Nannambra","Neduva","Nilambur","Othukkungal","Pallikal","Parappur","Perinthalmanna(Perintalmanna)","Perumanna","Peruvallur","Ponmundam","Ponnani","Talakkad","Tanalur","Thenhippalam(Chelari)","Thennala(Tennala)","Thirunavaya(Tirunavaya)","Tirur","Tirurangadi","Triprangode","Urakam","Vazhayur","Vengara","Alathur","Chittur-Thathamangalam","Hemambikanagar","Koduvayur","Mannarkad-I","Marutharode","Muthuthala","Ongallur-I","Ongallur-II","Ottappalam(Ottapalam)","Palakkad","Pattambi","Pirayiri","PudusseryCentral","PudusseryWest","Puthunagaram","Puthuppariyaram","Shoranur","Thirumittacode-II","Thrithala","Vaniyamkulam-II","Adoor","Kozhenchery(Kozhencherry)","Pathanamthitta","Thiruvalla(Tiruvalla)","Alamcode","Athiyannur","Attingal","Azhoor","Edakkode","Iroopara","Kalliyoor","Kanjiramkulam","Karakulam","Keezhattingal","Kizhuvalam-Koonthalloor","Kudappanakkunnu","Kulathummal","Malayinkeezhu","Nedumangad","Neyyattinkara","Pallichal","Pallippuram","Parassala","Parasuvaikkal","Sreekaryam","Thiruvananthapuram[Trivandrum]","Uliyazhathura","Vakkom","Varkala","Vattappara","Vattiyoorkavu","Veiloor","Venganoor","Vilappil","Vilavoorkkal","Adat","Akathiyoor","Ala","Alur","Amballur","Anjur","Anthicad(Anthikad)","Avanur","Avinissery","Brahmakulam","Chalakudy","Chavakkad","Chelakkara","Chendrappini","Cherpu","Cheruthuruthi","Chevvoor","Chiramanangad(Chermanangad)","Chiranellur","Chittanda","Chittilappilly","Choolissery","Choondal","Desamangalam","Edakkalathur","Edakkazhiyur","Edathirinji","Edathiruthy","Edavilangu","Elavally","Enkakkad","Eranellur","Eravu","Eyyal","Guruvayoor(Guruvayur)","Iringaprom","Irinjalakuda","Kadavallur","Kadikkad","Kainoor","Kaipamangalam","Kaiparamba","Kallettumkara","KallurThekkummuri","KallurVadakkummuri","Kandanassery","Kaniyarkode","Karamuck","Karikkad","Kariyannur","Kattakampal","Kattur(Kattoor)","Killannur","Kizhakkummuri","Kizhuppillikkara","Kodannur","Kodungallur","Kolazhy","Koratty","Kottappuram","Kozhukkully","Kumaranellur","Kunnamkulam","Kurichikkara","Kurumpilavu","Kuttoor","Madathumpady","Madayikonam","Manakkody","Manalur(Manaloor)","Manavalassery","Marathakkara","Methala","Minalur","Mullassery","Mundathikode","MuringurVadakkummuri","Nadathara","Nedumpura","Nelluwaya","Nenmenikkara","Oorakam","Orumanayur","Padiyam","Padiyur","Palissery","Pallippuram","Paluvai","Panangad","Pappinivattom","Parakkad","Paralam","Parappukkara","Pavaratty","Pazhanji","Perakam","Peramangalam","Peringandoor","Perinjanam","Pookode","Poomangalam","Porathissery","Porkulam","Pottore","Poyya","Pullur","Punnayur","Punnayurkulam","Puranattukara","Puthukkad","Puthur","Puzhakkal","Talikkulam(Thalikulam)","Thaikkad","Thangalur","Thanniyam","Thekkumkara","Tholur","Thrissur","Trikkur","Vadakkekad","Vadakkumkara","Vadakkummuri","Vadama","Vadanappally","Vallachira","Vellanikkara","Vellookkara","Velur","Veluthur","Venginissery","Venkitangu","Venmanad","Vylathur","Wadakkanchery(Wadakkancherry)","Kalpetta"];
</script>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}
</script>
<script>
autocomplete(document.getElementById("myInput"), countries);
</script>
<!-- NOTIFICATION -->
<div class="notify-div">
    <div class="absolute">
        <div class="table">
            <div class="cell">
                <span></span>
            </div>
        </div>
    </div>
</div>

<!-- SITE LOADER -->
<div class="site-loader">
    <div class="absolute">
        <div class="table">
            <div class="cell">
                <img src="/Content/images/site-loader.svg" alt="JobVeno">
            </div>
        </div>
    </div>
</div>
<script src="/Content/js/jquery.min.js"></script>

<script src="/Content/js/jquery.tinyscrollbar.min.js"></script>
<script>
    $(function () {
        $('form').submit(function () { if ($(this).valid()) { showLoader(); } });
        if ($(window).width() >= 1200) {
            $('#scrollbar-container').tinyscrollbar();
        }
        $('.radio-row input[type="radio"]').change(function () {
            setTag();
        });
        setTag();
        function setTag()
        {
            $insert = $('.radio-row input[type="radio"]:checked').parent('div').find('span').text();
            $insert = $insert.charAt(0).toUpperCase() + $insert.substring(1, $insert.length);
            $('.radio-insert').val('').val($insert).change();
        }
    });
</script>


<script src="/Content/js/tweenmax.min.js"></script>
<script src="/Content/js/custom-1.0.6.js"></script>


<script src="/Scripts/jquery.validate.js"></script>
<script src="/Scripts/jquery.validate.unobtrusive.js"></script>
<script type="text/javascript"> $(function () {setTimeout(function () { $(".notify").slideUp('slow'); }, 5000);});</script>




</body>
</html>
