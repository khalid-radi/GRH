     <aside id="slide-out" class="side-nav light-blue darken-0 fixed">
                <div class="side-nav-wrapper">
                    <br><br>
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/admin4.jpg" class="circle" alt="">
                            <h6>Bonjour:</h6>
                        </div>
                        <div class="sidebar-profile-info">
                    <?php 
$eid=$_SESSION['eid'];
$sql = "SELECT FirstName,LastName,EmpId from  tblemployees where id=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                <p><?php echo htmlentities($result->FirstName." ".$result->LastName);?></p>
                                <span><?php echo htmlentities($result->EmpId)?></span>
                         <?php }} ?>
                        </div>
                    </div>
              
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                  
  <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php" style="color:black;"><i class="material-icons" style="color:black;">account_box</i>Mon profil</a></li>
 <!-- <li class="no-padding"><a class="waves-effect waves-grey" href="emp-changepassword.php"><i class="material-icons">settings_input_svideo</i>Chnage Password</a></li>-->
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey" style="color:black;"><i class="material-icons" style="color:black;">apps</i>Congés<i class="nav-drop-icon material-icons" style="color:black;">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a href="apply-leave.php" >Demander un  congé</a></li>
                                <li><a href="leavehistory.php">Historique de congé</a></li>
                            </ul>
                        </div>
                    </li>
                
         
                    <li class="no-padding">
                        <a class="waves-effect waves-grey" href="attestation.php" style="color:black;"><i class="material-icons" style="color:black;">apps</i>Attestations de travail</a>
                    </li>  
                    <li class="no-padding">
                        <a class="waves-effect waves-grey" href="bulletin.php" style="color:black;"><i class="material-icons" style="color:black;">apps</i>Bulletin de salaire</a>
                    </li>  
                    <li class="no-padding">
                        <a class="waves-effect waves-grey" href="doc.php" style="color:black;"><i class="material-icons" style="color:black;">apps</i>Document à télécharger</a>
                    </li>  
                    <li class="no-padding">
                        <a class="waves-effect waves-grey" href="logout.php" style="color:black;"><i class="material-icons" style="color:black;">exit_to_app</i>Se déconnecter</a>
                    </li>  
                 
                   
                </ul>
                   
                </ul>
                
                
                
                <div class="footer black darken-0">
                    
                    <p class="copyright" style="color:white;">©  2023 RH_GRH. Tous les droits sont réservés.</p>
                
                </div>
                </div>
            </aside>