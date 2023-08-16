<?php
/**
 * Template Name: Sala Reuniones
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Agencyup
 */
?>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
         <h1 style="text-align:center;font-family: 'Fira Sans', Sans-serif;">Sala de reunions</h1> 
         <script src='https://8x8.vc/vpaas-magic-cookie-fb1548f21bd144c19df5e8ca4b69622c/external_api.js' async></script>
        <style>html, body, #jaas-container { height: 100%; }</style>
        <script type="text/javascript">
          window.onload = () => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
			  width: 900,
			  height: 700,
              roomName: "vpaas-magic-cookie-fb1548f21bd144c19df5e8ca4b69622c/SampleAppSteadyCriteriaManifestSoftly",
              parentNode: document.querySelector('#jaas-container'),
							// Make sure to include a JWT if you intend to record,
							// make outbound calls or use any other premium features!
							// jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtZmIxNTQ4ZjIxYmQxNDRjMTlkZjVlOGNhNGI2OTYyMmMvNGNlNzhkLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE2ODgxMjA5MTcsImV4cCI6MTY4ODEyODExNywibmJmIjoxNjg4MTIwOTEyLCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtZmIxNTQ4ZjIxYmQxNDRjMTlkZjVlOGNhNGI2OTYyMmMiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOmZhbHNlLCJvdXRib3VuZC1jYWxsIjpmYWxzZSwic2lwLW91dGJvdW5kLWNhbGwiOmZhbHNlLCJ0cmFuc2NyaXB0aW9uIjpmYWxzZSwicmVjb3JkaW5nIjpmYWxzZX0sInVzZXIiOnsiaGlkZGVuLWZyb20tcmVjb3JkZXIiOmZhbHNlLCJtb2RlcmF0b3IiOnRydWUsIm5hbWUiOiJUZXN0IFVzZXIiLCJpZCI6Imdvb2dsZS1vYXV0aDJ8MTExMTg5OTA0OTA3MjcxOTMxMjQ1IiwiYXZhdGFyIjoiIiwiZW1haWwiOiJ0ZXN0LnVzZXJAY29tcGFueS5jb20ifX0sInJvb20iOiIqIn0.M5Koa7YX7L8pdpUf8gfBWJSopL1-jfZr1N6ACdR5PvRF5cupIAuYrzb5QrPcdytL6zKLYxTNHQLu-Neqy7G2y5rxvheRypdj2hpSBAE2x0LCgiUeTTktiecCSC5GwJGV_TWOqfOspuMnGZVoTei5QuTCLPBNzIptBAQn3AUR44AX-MwlD_1fsYshxlib_rKo-twV4Za2oEQKrM3AuKKG7nsvXZseNKFvGzhW0TRCztHswCqrpHU0t9uiKZ91tebSo3tWFp9lRXA_6xtl205OaS8q7aZE_EBq-U1G10Xf7FiQwKU7NyIsMtRkdPmqCyzTPMYBWYHEKKXhcI6_mFntlg"
            });
          }
        </script>
      
      <center><div id="jaas-container" /> </div></center>
      </div>
    </div>
  </div>
</main>
<?php
