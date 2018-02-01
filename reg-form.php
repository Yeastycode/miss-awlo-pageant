<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$referer_link = filter_input(INPUT_GET, "ref");
?>

<div id="root">
   <form enctype="multipart/form-data" method="post" id="awlo-pageant-form" class="form reg-form" v-show="ready" @submit.prevent="navigate('forward')">
      <input type="hidden" name="request" value="save-pageant-details" />
      <input type="hidden" name="payment_id" :value="payment_id" />
      <div class="j-row">
         <input type="hidden" name="referer_link" value="<?php echo $referer_link; ?>" />
         <input type="hidden" name="valid_age" v-model="form.valid_age" />
         <h4>Step {{step}}</h4>
         <div v-show="inStep(1)" v-if="isFilled(1)">
            <div class="col-md-6 form-group">
               <label>First Name <span>*</span></label>
               <div class="input">
                  <input type="text" v-model="form.first_name" class="form-control" name="first_name" placeholder="First &amp; Last Name" required />
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Middle Name <span>*</span></label>
               <div class="input">
                  <input type="text" v-model="form.middle_name" class="form-control" name="middle_name" placeholder="Middle &amp; Last Name" required />
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Last Name <span>*</span></label>
               <div class="input">
                  <input type="text" v-model="form.last_name" class="form-control" name="last_name" placeholder="Last &amp; Last Name" required />
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Email <span>*</span></label>
               <div class="input">
                  <input type="email" v-model="form.email" class="form-control" name="personal_mail" placeholder="Enter Email Address" id="pf-email" value="popsyjunior@gmail.com" required />
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Date of Birth <span>*</span></label>
               <div class="input">
                  <input type="date" v-model="form.date_of_birth" @change="validateDate" class="form-control date-picker hasDatepicker" name="Date_of_Birth" placeholder="Enter Date of Birth" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Phone Number <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Alternate Phone Number</label>
               <div class="input">
                  <input type="text" class="form-control" name="alt_phone_numer" placeholder="Enter Alternate Phone Number">
               </div>
            </div>

            <div class="col-md-6 form-group">
               <label>Nationality <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Country of Residence <span>*</span></label>
               <div class="input">
                  <select class="form-control" name="country_of_residence" required="required" data-dpmaxz-eid="13">
                     <option v-for="country in countries">{{country}}</option>
                  </select>
                  <i></i>
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>State <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="state" placeholder="Enter State" required="required">
               </div>
            </div>
         </div>

         <div v-show="inStep(2)" v-if="isFilled(2)">
            <div class="col-md-6 form-group">
               <label>Contact Address <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="contact_address" placeholder="Enter Contact Address" required="required">
               </div>
            </div>

            <div class="col-md-6 form-group">
               <label>Highest Educational Qualification <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="highest_educational_qualification" placeholder="Enter Highest Educational Qualification" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Higher Institution (Past or Present) <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="higher_institution_attended" placeholder="Enter Higher Institution (Past or Present)" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Name of Guarantor/Guardian <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="name_of_guarantor" placeholder="Enter Name of Guarantor/Guardian" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Phone Number of Guarantor/Guardian <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="phone_of_guarantor" placeholder="Enter Phone Number of Guarantor/Guardian" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Alternate Phone Number of Guarantor/Guardian</label>
               <div class="input">
                  <input type="text" class="form-control" name="alt_phone_of_guarantor" placeholder="Enter Alternate Phone Number of Guarantor/Guardian">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Email Address of Guarantor/Guardian <span>*</span></label>
               <div class="input">
                  <input type="email" class="form-control" name="email_of_guarantor" placeholder="Enter Email Address of Guarantor/Guardian" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Contact Address of Guarantor/Guardian <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="contact_of_guarantor" placeholder="Enter Contact Address of Guarantor/Guardian" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>State <span>*</span></label>
               <div class="input">
                  <input type="text" class="form-control" name="state" placeholder="Enter State" required="required">
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Country of Residence <span>*</span></label>
               <div class="input">
                  <select class="form-control" name="country_of_residence" required="required" data-dpmaxz-eid="24">
                     <option v-for="country in countries" :value="country">{{country}}</option>
                  </select>
                  <i></i>
               </div>
            </div>
         </div>

         <div v-show="inStep(3)" v-if="isFilled(3)">
            <div class="col-md-6 form-group">
               <label>Describe yourself. Share your work/educational experience expressing your passion/talents (150 word) <span>*</span></label>
               <div class="input">
                  <textarea type="text" class="form-control" name="work_experience" rows="3" placeholder="Enter Describe yourself. Share your work/educational experience expressing your passion/talents (150 word)" required="required"></textarea>
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Tell us something unique about you; something special you do or have done? (50 word) <span>*</span></label>
               <div class="input">
                  <textarea type="text" class="form-control" name="something_unique" rows="3" placeholder="Enter Tell us something unique about you; something special you do or have done? (50 word)" required="required"></textarea>
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Tell us something about you that can inspire others? (50 word) <span>*</span></label>
               <div class="input">
                  <textarea type="text" class="form-control" name="how_you_inspire_others" rows="3" placeholder="Enter Tell us something about you that can inspire others? (50 word)" required="required"></textarea>
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>Tell us some of your hobbies? (50 word) <span>*</span></label>
               <div class="input">
                  <textarea type="text" class="form-control" name="hobbies" rows="3" placeholder="Enter Tell us some of your hobbies? (50 word)" required="required"></textarea>
               </div>
            </div>
            <div class="col-md-6 form-group">
               <label>What are some of your personal values? (50 word) <span>*</span></label>
               <div class="input">
                  <textarea type="text" class="form-control" name="personal_values" rows="3" placeholder="Enter What are some of your personal values? (50 word)" required="required"></textarea>
               </div>
            </div>

             <div class="col-md-6 form-group">
               <label>Mention one person who has made great impact in your life? In what way? (100 word-limit) <span>*</span></label>
               <div class="input">
                  <textarea type="text" class="form-control" name="impact_in_your_life" rows="3" placeholder="Enter Mention one person who has made great impact in your life? In what way? (100 word-limit)" required="required"></textarea>
               </div>
            </div>
         </div>

         <div v-show="inStep(4)" v-if="isFilled(4)">
            <div class="col-md-6">
               <div class="form-group">
                  <label>What Leadership role have you played before? and how your community, school, or workplace has benefited from it.(150 word) <span>*</span></label>
                  <div class="input">
                     <textarea type="text" class="form-control" name="leadership_you_played" rows="3" placeholder="Enter What Leadership role have you played before? and how your community, school, or workplace has benefited from it.(150 word)" required="required"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label>What inspires you most about Africa (100 word) <span>*</span></label>
                  <div class="input">
                     <textarea type="text" class="form-control" name="inspiration_about_africa" rows="3" placeholder="Enter What inspires you most about Africa (100 word)" required="required"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label>If all young women in the world looked up to you. In what way would you influence them? (200 word) <span>*</span></label>
                  <div class="input">
                     <textarea type="text" class="form-control" name=" you_influence_them" rows="3" placeholder="Enter If all young women in the world looked up to you. In what way would you influence them? (200 word)" required="required"></textarea>
                  </div>
               </div>

               <div class="form-group">
                  <label>Preferred State for Audition (Nigerian residents only) <span>*</span></label>
                  <div class="input">
                     <select class="form-control" name="preferred_state_audition" required="required" data-dpmaxz-eid="25">
                        <option value="Lagos-State">Lagos State</option>
                        <option value="Abuja">Abuja</option>
                        <option value="Imo State">Imo State</option>
                     </select>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <h4>Upload your Pictures</h4>
               </div>

               <div class="col-md-3" v-for="(img, i) in images">
                  <div class="form-group">
                     <img class="img img-rounded" :src="img.src" style="width:100%" />
                  </div>

                  <div class="form-group">
                     <label>{{img.title}} (Max. File Size is 2MB</label>
                     <div class="input  append-small-btn">
                        <div class="file-button">
                           <input type="file" :name="'upload_' + (i+1)" required @change="readURL($event,i+1)" placeholder="File Name (Max. File Size is 2MB)" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div v-show="inStep(5)" v-if="isFilled(5)">
            <div class="row text-center">
               <div class="col-md-12 form-group">
                  <img src="https://awlo.org/missawlopageant/wp-content/plugins/payment-forms-for-paystack/public/../images/logos@2x.png" alt="cardlogos" class="paystack-cardlogos size-full wp-image-1096">
               </div>
               <div style="padding: 20px">
                  <a href="#" class="btn btn-success btn-lg" v-on:click.prevent="payWithPaystack">Pay Now</a>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-12">
         <div class="text-center">
            <a href="#" @click="navigate('back')" class="btn btn-primary" v-show="step > 1">
               <i class="fa fa-arrow-left"></i> Previous
            </a>

            &nbsp;

            <button type="submit" class="btn btn-success" v-show="step < max_steps">
               Next <i class="fa fa-arrow-right"></i>
            </button>
         </div>
      </div>
   </form>
</div>

<!-- Paystack -->
<form >
   <script src="https://js.paystack.co/v1/inline.js"></script>
</form>

<script>
var payment = {
   "accesscode": "<?php echo md5(md5(microtime) . md5(date())); ?>",
   "amount": 6000 * 100
};

// payment.amount = 5000;

var form_target = "index.php";
</script>

<!-- Script for form -->
<script type="text/javascript" src="js/reg-form.js?pg=<?php echo rand(1,99); ?>"></script>
