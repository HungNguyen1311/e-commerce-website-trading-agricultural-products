@extends('welcome')
@section('content')
<h2 class="text-center">Liên Hệ</h2>
<div class= "container-fluid">
         <div class= "row body-contact ">
            <div class ="col-sm-6">
               <div class="contact-info">
                   <h3 class="h3-contact-styling" >Thông tin liên hệ</h3>
                   <p><span class="info-styling">Địa chỉ:</span> 138/7 Trần Vĩnh Kiết, Ninh Kiều, Cần Thơ</p>
                   <p><span class="info-styling">Hotline:</span> <i class="fas fa-phone-volume"></i> 08 34 445 508 - 091888998</p>
                   <p><span class="info-styling">Email:</span> QH-fruist@gmail.contact.com</p>
                   <p><span class="info-styling">Fanpage:</span> https://www.facebook.com/qh-fruit/</p>
                   <p><span class="info-styling">Web-site:</span> https://qhfruits.com & https://traicayquochung.com</p>
                <div class="form-group contact-email">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control email-contact " placeholder="abc@gmail.com"   required oninvalid="this.setCustomValidity('Vui lòng điền vào các trường bắt buộc!')" onchange="this.setCustomValidity('')">                     
                    </div>
                </div>
                <p><span class="final-content-contact">Vui lòng để lại email hoặc lời nhắn chúng tôi sẽ liên hệ với bạn sớm nhất có thể.</span></p>
            </div>
            </div>
            <div class ="col-sm-6 ">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d588.9658565270342!2d105.74840035188001!3d10.014941355009782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0884eec972f41%3A0x55f145d4d4e069b!2zVHLhuqduIFbEqW5oIEtp4bq_dCwgQW4gQsOsbmgsIE5pbmggS2nhu4F1LCBD4bqnbiBUaMah!5e1!3m2!1svi!2s!4v1647014454923!5m2!1svi!2s" width="700" height="600" style="border:5px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            </div>
         </div>
      </div>
@endsection    