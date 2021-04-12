<?php  
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
  
// $autonum = New Autonumber();
// $res = $autonum->single_autonumber(2);
 @$empid = $_GET['id'];
    if($empid==''){
  redirect("index.php");
}
 

  $employee = New Employee();
  $emp = $employee->single_employee($empid);

  $birthday = date_format(date_create($emp->BIRTHDATE),'m/d/Y');
  $mv = date_format(date_create($emp->BIRTHDATE),'m');
  $m =date_format(date_create($emp->BIRTHDATE),'M');
  $d = date_format(date_create($emp->BIRTHDATE),'d');
  $y = date_format(date_create($emp->BIRTHDATE),'Y');


  if ($emp->SEX == 'Male') {
    # code...
   $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Vrouw</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  checked="True" name="optionsRadios" type="radio" value="Male">Man</label>
                </div>
              </div> 
             
          </div>';
  }else{
       $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1"  checked="True" name="optionsRadios" type="radio" value="Female">Vrouw</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  name="optionsRadios" type="radio" value="Male"> Man</label>
                </div>
              </div> 
             
          </div>';

  }

   switch ($emp->CIVILSTATUS) {

     case 'Single':
       # code...
        $civilstatus =' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Selecteer</option>
                                      <option SELECTED value="Single">Single</option>
                                      <option value="Married">Getrouwd</option>
                                      <option value="Widow" >Weduwe</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';
       break;
     case 'Married':
       # code...
         $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Selecteer</option>
                                      <option  value="Single">Single</option>
                                      <option SELECTED value="Getrouwd">Getrouwd</option>
                                      <option value="Widow" >Weduwe</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';

       break;
     case 'Widow':
       # code...
       $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Selecteer</option>
                                      <option  value="Single">Single</option>
                                      <option  value="Married">Getrouwd</option>
                                      <option SELECTED value="Widow" >Weduwe</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';
       break;
     default:
         $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option SELECTED value="none" >Selecteer</option>
                                      <option  value="Single">Single</option>
                                      <option  value="Married">Getrouwd</option>
                                      <option  value="Widow" >Weduwe</option> 
                                  </select> ';
         break;     
       
   }

   switch ($emp->WORKSTATS) {

     case 'Regular':
       # code...
        $workstatus ='
        <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option value="none" >Selecteer</option>
                                      <option value="Temporary">Tijdelijk</option>
                                      <option SELECTED  value="Regular">Regelmatig</option>
                                      <option value="Probationary">Proef</option> 
                                  </select> ';
       break;

     case 'Regular':
       # code...
        $workstatus ='
        <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option value="none" >Selecteer</option>
                                      <option value="Temporary">Tijdelijk</option>
                                      <option SELECTED value="Regular">Regelmatig</option>
                                      <option value="Probationary">Proef</option> 
                                  </select> ';
       break;
     case 'Probationary':
       # code...
         $workstatus='
         <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option value="none" >Selecteer</option>
                                      <option value="Temporary">Tijdelijk</option>
                                      <option value="Regular">Regelmatig</option>
                                      <option SELECTED value="Probationary">Proef</option> 
                                  </select> ';

       break; 
	   
     default:
        $workstatus='
       <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option SELECTED value="none" >Selecteer</option>
                                      <option value="Temporary">Tijdelijk</option>
                                      <option value="Regular">Regelmatig</option>
                                      <option value="Probationary">Proef</option> 
                                  </select> ';
        break;
       
   }

  
 ?> 
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Bijwerken Werknemer</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

                 <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST"> 
              

                <input  id="EMPLOYEEID" name="EMPLOYEEID" type="hidden" value="<?php echo $emp->EMPLOYEEID;?>"  >
                   
                
                 <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "FNAME">Voornaam:</label>

                        <div class="col-md-8"> 
                           <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                              "Firstname" type="text" value="<?php echo $emp->FNAME;?>"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "LNAME">Achternaam:</label>

                        <div class="col-md-8"> 
                          <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                              "Lastname"   value="<?php echo $emp->LNAME;?>"   onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "MNAME">Tussenvoegsel:</label>

                        <div class="col-md-8"> 
                          <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                              "Middle Name"   value="<?php echo $emp->MNAME;?>"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                           <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" type="text" value=""> -->
                        </div>
                      </div>
                    </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Adres:</label>

                      <div class="col-md-8">
                        
                         <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Adres" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $emp->ADDRESS;?></textarea>
                      </div>
                    </div>
                  </div> 


                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Gender">Geslacht:</label>

                      <?php
                        echo $radio;
                      ?>
 
                    </div>
                  </div>  

                  <div class="form-group">
                      <div class="rows">
                        <div class="col-md-8">
                          <h4>
                          <div class="col-md-4">
                            <label class="col-lg-12 control-label">Geboortedatum</label>
                          </div>

                          <div class="col-lg-3">
                            <select class="form-control input-sm" name="month">
                              <option>Maand</option>
                              <?php


                                 echo '<option SELECTED value='.$mv.'>'.$m.'</option>';

                                 $mon = array('Jan' => 1 ,'Feb'=> 2,'Mar' => 3 ,'Apr'=> 4,'May' => 5 ,'Jun'=> 6,'Jul' => 7 ,'Aug'=> 8,'Sep' => 9 ,'Oct'=> 10,'Nov' => 11 ,'Dec'=> 12 );    
                                
                            
                                foreach ($mon as $month => $value ) { 
                                # code...
                               
                                echo '<option value='.$value.'>'.$month.'</option>';
                                }
                              
                                   
                              ?>
                            </select>
                          </div>
 
                          <div class="col-lg-2">
                            <select class="form-control input-sm" name="day">
                              <option>Dag</option>
                            <?php 
                             echo '<option SELECTED value='.$d.'>'.$d.'</option>';
                              $d = range(1, 31);
                              foreach ($d as $day) {
                                echo '<option value='.$day.'>'.$day.'</option>';
                              }
                            
                            ?>
                              
                            </select>
                          </div>

                          <div class="col-lg-3">
                            <select class="form-control input-sm" name="year">
                              <option>Jaar</option>
                            <?php 
                                echo '<option SELECTED value='.$y.'>'.$y.'</option>';
                                $years = range(2010, 1900);
                                foreach ($years as $yr) {
                                echo '<option value='.$yr.'>'.$yr.'</option>';
                                }
                            
                            ?>
                            
                            </select>
                          </div>
                          </h4>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "BIRTHPLACE">Geboorteplaats:</label>

                                  <div class="col-md-8">
                                    
                                     <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE" placeholder=
                                        "Geboorteplaats" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" 
                                        autocomplete="off"><?php echo $emp->BIRTHPLACE;?></textarea>
                                  </div>
                                </div>
                              </div> 


                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "TELNO">Conact Nu.:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
                                      "Conact Nu." type="text" any value="<?php echo $emp->TELNO;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                                </div>
                              </div>
                            </div> 

                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "CIVILSTATUS">Burgerlijke staat:</label>

                                <div class="col-md-8">
                                  <?php echo $civilstatus; ?>
                                </div>
                              </div>
                            </div> 

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "POSITION">Positie:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="POSITION" name="POSITION" placeholder=
                                      "Positie" type="text" any value="<?php echo $emp->POSITION;?>" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                                </div>
                              </div>
                            </div>


                             

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "DATEHIRED">Datum ingehuurd:</label>

                                <div class="col-md-8">
                                  <div class="input-group " > 
                                      <!-- <label><?php echo date_format(date_create($emp->BIRTHDATE),'m/d/Y'); ?> </label>  
                                      <i class="fa fa-calendar"></i>  -->
                                        <div class="input-group-addon"> 
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            <input id="datemask2" name="DATEHIRED"  value="<?php echo date_format(date_create($emp->DATEHIRED),'m/d/Y'); ?>" type="text" class="form-control input-sm datemask2"   data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
                                       
                                   </div>       
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "EMP_EMAILADDRESS">E-mailadres:</label> 
                                <div class="col-md-8">
                                   <input type="Email" class="form-control input-sm" id="EMP_EMAILADDRESS" name="EMP_EMAILADDRESS" placeholder="E-mailadres"   autocomplete="false" value="<?php echo  $emp->EMP_EMAILADDRESS; ?>"/> 
                                </div>
                              </div>
                            </div>  


                         <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for=
                              "COMPANYNAME">Bedrijfsnaam:</label>

                              <div class="col-md-8"> 
                                <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
                                  <option value="None">Selecteer</option>
                                  <?php 
                                    $sql ="Select * From tblcompany WHERE COMPANYID=".$emp->COMPANYID;
                                    $mydb->setQuery($sql);
                                    $result  = $mydb->loadResultList();
                                    foreach ($result as $row) {
                                      # code...
                                      echo '<option SELECTED value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                                    }
                                    $sql ="Select * From tblcompany WHERE COMPANYID!=".$emp->COMPANYID;
                                    $mydb->setQuery($sql);
                                    $result  = $mydb->loadResultList();
                                    foreach ($result as $row) {
                                      # code...
                                      echo '<option value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                                    }

                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>  
 
               
                  
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Opslaan</button> 
                          <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                       </div>
                    </div>
                  </div> 
        </form>


             