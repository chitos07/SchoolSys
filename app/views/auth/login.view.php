


<div class="container"  dir="ltr">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                 <figure>
                       <figcaption>School System Img</figcaption>
                     <img  class="login-img" src="/img/lol.jpg">
                 </figure>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><?= $login_header ?></h1>
                      <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message): ?>
                          <p class=" text-danger  message t<?= $message[1] ?>"><?= $message[0] ?><a href="" class="closeBtn"><i class="fa fa-times"></i></a></p>
                      <?php endforeach;endif; ?>

                  </div>
                  <form  dir="rtl"  class="user" autocomplete="off" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                      <input type="text" name="ucname" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?=  $login_ucname ?>">
                    </div>
                    <div class="form-group">
                      <input type="password"  name="ucpwd" class="form-control form-control-user" id="exampleInputPassword" placeholder="<?= $login_ucpwd ?>">
                    </div>
                    <div class="form-group">

                    </div>
                    <input  type="submit" name="login" value="<?= $login_button ?>" class="btn btn-primary btn-user btn-block">
                   
                    <hr>
              
                   
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>