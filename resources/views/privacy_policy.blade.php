@extends('layouts.web')

@section('content')
<!-- Section: inner-header -->
  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/images/events.jpg">
    <div class="container pt-70 pb-20">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="title text-white">Privacy Policy</h2>
            <ol class="breadcrumb text-center text-black mt-10">
              <li><a href="/">Home</a></li>
              <li class="active text-theme-colored">Privacy Policy</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
    
    <!-- Section: event calendar -->

    <section>
      <div class="container"> 
        <!-- Heading -->
        <div class="row">
          <div class="col-md-12">

          <p>This Privacy Policy describes how {{ config('app.name')}} collects, uses, and protects the personal information of individuals who use the church website and online donation platform provided by the Church. By accessing or using the Platform, you consent to the collection, use, and disclosure of your personal information as described in this Policy.</p>

           <h3>Information We Collect</h3>
            a. Personal Information: We may collect personal information, such as your name, address, email address, phone number, and donation details when you use the Platform.<br>
            b. Payment Information: When you make online donations, we collect payment information, such as credit card or bank account details. Please note that we do not store or retain your payment information on our servers. We use reputable payment processors who handle your payment securely.<br>

            <h3>Use of Personal Information</h3>
            a. We use your personal information to process donations, communicate with you, and provide you with information about the Church's activities, events, and initiatives.<br>
            b. We may also use your personal information to improve our services, conduct research and analysis, and comply with legal obligations.<br>

            <h3>Information Sharing and Disclosure</h3>
            a. We may share your personal information with trusted service providers who assist us in operating the Platform and delivering our services. These service providers are contractually bound to protect the confidentiality and security of your personal information.<br>
            b. We may also share your personal information when required by law or to protect our rights, property, or safety, or the rights, property, or safety of others.<br>

            <h3>Data Security</h3>
            a. We take reasonable steps to protect your personal information from unauthorized access, use, or disclosure.<br>
            b. We use industry-standard security measures, such as encryption and secure socket layer (SSL) technology, to protect the transmission of sensitive information.<br>
            c. While we strive to protect your personal information, no method of transmission over the Internet or electronic storage is completely secure. Therefore, we cannot guarantee its absolute security.

            <h3>Third-Party Websites</h3>
            a. The Platform may contain links to third-party websites. This Policy does not apply to those websites. We encourage you to review the privacy policies of those third-party websites before providing any personal information.

            <h3>Children's Privacy</h3>
            a. The Platform is not intended for children under the age of 13. We do not knowingly collect personal information from children. If we become aware that we have collected personal information from a child without parental consent, we will take steps to remove the information from our systems.

            <h3>Your Rights</h3>
            a. You have the right to access, correct, or delete your personal information. If you wish to exercise these rights or have any questions about your personal information, please contact us using the information provided below.<br>

            <h3>Changes to this Policy</h3>
            a. We may update this Policy from time to time. Any changes will be posted on the Platform, and the revised Policy will become effective when posted. Your continued use of the Platform after any changes signifies your acceptance of the revised Policy.<br>

            <h3>Contact Us</h3>
            a. If you have any questions or concerns about this Policy or our privacy practices, please contact us at {{ config('app.email')}}.<br>

            <p>Please read this Privacy Policy carefully. By using the Platform, you acknowledge that you have read, understood, and agreed to the terms and conditions of this Policy.</p>

           
            
          </div>
        </div>
      </div>
    </section>
   
@endsection