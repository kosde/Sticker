<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "../css_ext.php";
    ?>
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>
<?php include "nav.php"; ?>
    <main>
    <section class="first_text">
            <div class="mainimage_custom container">
                <div class="wrapper_custom">
                    <h1 class="title">Help</h1>
                    <span style="display:none;" class="ratings-wrapper">
                        <span class="rating-stars">
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                            <i class="fa fa-star stars"></i>
                        </span>
                        <span class="reviews-count">
                            <a href="#reviews">81,765 reviews</a>
                        </span>
                    </span>
                </div>
            </div>
        </section>
        <section style="padding-top: 100px;">
            <div class="container">
            <ul class="help_left font-light">
                
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        No, changes cannot be made after proof approval. Review your proof carefully before approving it. Once it's approved we automatically add your order to our production queue and aim to ship it as fast as possible..    
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What if my artwork is low quality?
                    </h4>
                    <div class="  articleContent"> 
                        <p class="standard font-light"> 
                            If your artwork is low quality, we will let you know and recommend next steps, such as using upscale
                            to increase the resolution of your image for free, or using redraw
                            to upgrade your image to a vector graphic for $29.
                        </p>
                        <p class="standard font-light">
                            If your artwork is especially complex and low resolution, we may not be able to redraw it and will contact you to request a higher quality version.
                        </p>
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        How do I increase the resolution of my artwork? 
                    </h4>
                    <div class="  articleContent">
                        <p class="standard font-light"> 
                            For best print quality, we recommend uploading vector artwork or high resolution images at 300 PPI or better. You can increase artwork resolution automatically by using 
                            upscale.
                        </p>
                        <p class="standard font-light">
                            1.- Set up your artwork using our optional design templates.
                        </p>
                        <p class="standard font-light">
                            2.- If your artwork is in vector format, send us the file in its original format (AI, EPS, SVG or PDF).
                        </p>
                        <p class="standard font-light">
                            3.- If you created your artwork in Photoshop, check your resolution by selecting Image > Image Size... 
                        </p>
                        <img src="../../assets/help/image-resolution.webp" alt="">
                        <p class="standard font-light">
                            Check the size and resolution of your image. For example, If you are ordering a 3" x 3" die cut sticker, 
                            your image size should be at least 3" x 3" and "Resolution: 300 pixels per inch" as shown in the above 
                            screenshot. If your image is at that size or larger, you can save your file as a PSD and upload it as is.
                        </p>
                        <p class="standard font-light">
                            If your image is at a lower resolution, it will not help to increase the pixels per inch or enlarge the image. 
                            This will only stretch the image to a larger size and it will still print fuzzy and pixelated.
                        </p>
                        <p class="standard font-light"> 
                            You can upgrade any image to a high resolution vector graphic with redraw.
                        </p>
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can you print Pantone colors? 
                    </h4>
                    <p class="standard font-light"> 
                        We convert Pantone colors to their CMYK equivalent values for printing. If you'd like to specify your own CMYK values, please include that in your artwork instructions when ordering.  
                    </p>
                    <p class="standard font-light">
                        You can view a list of CMYK colors and their corresponding CMYK values here.
                    </p>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can you resize my artwork for me?
                    </h4>
                    <div class="  articleContent">
                        <p class="standard font-light"> 
                            PPI stands for "pixels per inch" and represents the resolution of your artwork. 
                            Although DPI is a more commonly used term, when it comes to your artwork’s resolution PPI or Pixels Per Inch is most important. 
                        </p>
                        <p class="standard font-light">
                            Your artwork should be at least 300 PPI at the size you need. Watch the video and follow the steps to check your artwork's PPI. If you still aren't sure, please contact us
                            and we'll be happy to help..
                        </p>
                        <p class="standard font-light">
                            You can use the PPI (Pixels Per Inch) calculator below to determine the maximum sticker size based on your artwork. 
                        </p>
                        <p class="standard font-light">
                            <strong>Photoshop</strong>
                        </p>
                        <p class="standard font-light">
                            1.- Open file in Photoshop
                        </p>
                        <p class="standard font-light">
                            2.- Click "OK" on prompts (if any)
                        </p>
                        <p class="standard font-light">
                            3.- If there is extra space around the artwork that you want printed, 
                                remove it by using the Crop tool or Image > Trim. By removing the unwanted space, you'll be able to accurately tell the DPI of your artwork.
                        </p>
                        <p class="standard font-light">
                            4.- Go to Image > Image Size
                        </p>
                        <p class="standard font-light">
                            5.- Uncheck "Resample" 
                        </p>
                        <p class="standard font-light">
                            6.- Change the Width and Height units to Inches
                        </p>
                        <p class="standard font-light">
                            7.- Set the Width and/or Height to the size you need
                        </p>
                        <p class="standard font-light">
                            <strong>Mac</strong>
                        </p>
                        <p class="standard font-light">
                            1.- Open your image in Preview.
                        </p>
                        <p class="standard font-light">
                            2.- Up at the top, click "Tools" > "Adjust Size"
                        </p>
                        <p class="standard font-light">
                            3.- Uncheck the box labeled "Resample Image"
                        </p>
                        <p class="standard font-light">
                            4.- Next, using inches, change the size of your artwork to your desired print size.
                        </p>
                        <p class="standard font-light">
                            5.- The resolution should be at least 300 pixels per inch.
                        </p>
                        <p class="standard font-light">
                            <strong>PC</strong>
                        </p>
                        <p class="standard font-light">
                            1.- Right-click on the image file; then select "Properties."
                        </p>
                        <p class="standard font-light">
                            2.- Click on the tab "Details" in the image properties window.
                        </p>
                        <p class="standard font-light">
                            3.- Note the image dimensions such as 1200 x 600.
                        </p>
                        <p class="standard font-light">
                            Your PPI should be at least 300 for your artwork to be sufficient quality 
                            for printing. If your image is at a lower resolution, it will not help to 
                            increase the pixels/inch or enlarge the image. This will only stretch the 
                            image to a larger size and it will still print fuzzy and pixelated. 
                            In that case, we recommend contacting the original designer to get a better 
                            version of your artwork.
                        </p>
                        <p class="standard font-light">
                            You can also use upscale
                            to automatically increase your artwork resolution, or upgrade your artwork to vector format using our redraw
                            service..
                        </p>
                        <p>
                            <strong>Related FAQs:</strong>
                        </p>
                        <p class="standard font-light">  Can you scale my artwork to a new size? .
                        </p>
                        <p class="standard font-light">  What file formats do you accept? .
                        </p>
                        <p class="standard font-light">  How do I increase the resolution of my artwork? .
                        </p>
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What kind of changes can I request to my proof?  
                    </h4>
                    <div class="  articleContent">
                    <p class="standard font-light"> 
                        Sticker Mule allows you to request unlimited changes to your artwork and digital proof for free before you approve your proof .
                        Although we cannot design your artwork from scratch, we can make changes to existing artwork so that you get the exact sticker, magnet or button you want. 
                    </p>
                    <p class="standard font-light">
                        After you receive an email or text with a link to view your proof, you can leave a comment requesting changes..     
                    </p>
                    <p class="standard font-light">
                        Although we receive hundreds of unique change requests, the most common requests are to: 
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Add or remove a minimum border
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Make a border wider or narrower
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Add text (let us know your preferred font, size, and color)
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Change the sticker type (i.e. from die cut stickers to clear stickers)
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Change the background color                    
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Change to the size                    
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Add an internal cut (¼” or greater)                   
                    </p>
                    <p class="standard font-light">
                        <i class="fa fa-circle" style="font-size: 8px;padding-right: 30px;" aria-hidden="true"></i> Wrong artwork attached/Upload new artwork                    
                    </p>

                    <p class="standard font-light">
                        After you submit your change requests, our team will send you an updated proof to approve or to request additional changes.                    
                    </p>
                    <p class="standard font-light">
                        There are some changes that we cannot always make. For example, if you want to increase the height of your sticker without changing the width, your artwork would become skewed.                    
                        if your artwork is low resolution ,
                        we will work with you to recreate it so that it can be made into the size you want when possible. 
                    </p>
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Are templates available?
                    </h4>
                    <div class="  articleContent">
                        Templates available soon.
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can you print neon colors?  
                    </h4>
                    <div class="  articleContent">
                        No, we're not able to print neon colors. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        How long do I have to approve my proof?
                    </h4>
                    <div class="  articleContent">
                        <p class="standard font-light"> 
                            Your delivery date is dependent on your proof being approved by 5pm EST. Your proof must be approved before 
                            5pm EST or your delivery date will move forward the corresponding number of days.
                        </p>
                        <p class="standard font-light">
                            For orders produced at our factory in Italy, your proof must be approved before 6am EST or your delivery date will move 
                            forward the corresponding number of days.
                        </p>
                        <p class="standard font-light">
                            After all proofs are approved for your order we will email your estimated delivery date. 
                        </p>
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can you print RGB colors?  
                    </h4>
                    <div class="  articleContent">
                        <p class="standard font-light"> 
                            No, we can only print CMYK colors. It's on our roadmap to add support for RGB colors, but we do not know when this will be possible. 
                        </p>
                        <p class="standard font-light">
                            When artwork is submitted in RGB, the colors are converted to their closest available matches in CMYK before going to print. If you let us know your desired CMYK values  
                            when ordering it will make it easier for us to print your desired colors. Otherwise we will use our judgement to decide the closest equivalents.
                        </p>
                        <p class="standard font-light">
                            Since RGB has a larger range of colors than CMYK, some RGB colors are currently difficult or impossible to match exactly.  
                        </p>
                        <p class="standard font-light">
                            <strong>Related FAQ:</strong> Why are some RGB colors difficult to match?   
                        </p>
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        What file formats do you accept?   
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
                <div class="  article" style="list-style-type: none;">
                    <h4 class="  " style="color: #2b71b8;font-size: 15px;font-weight: 700;">
                        Can I request a change after I approve my proof? 
                    </h4>
                    <div class="  articleContent">
                        We accept all standard artwork formats. Send us your artwork and we'll provide an online proof within 4 hours. You can request changes to your proof and we will make them for free until you're happy. <br>
                        <br>
                        While we accept all standard artwork formats, we recommend uploading vector artwork when possible. Otherwise we recommend that your artwork be at least 300 pixels per inch. 
                    </div>
                </div>
            </ul>
            </div>
        </section>
        <section style="visivility:hidden; display:none;">
            <div class="container">
                <div style="padding: 100px 0 100px 0;">
                    <h2 class=" articleContent " style="" >
                        If you have any question or doubt please do not hesitate to contact us.  
                    </h2>
                    <form id="formUp" action="php/returns.php" method="post" enctype="multipart/form-data" style="padding: 0 200px 0 200px;">
                        <div data-testid="Dropzone" class="  dropzone">
                            <div class="  children">
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="fontlight" style="display: inline-block;">
                                                <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Name</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <input class="fill_content  input" id="orderNumber" name="name" required="" type="text" style="border: 1px solid #c8c8c8;">
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="fontlight" style="display: inline-block;">
                                                <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Email</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <input class="fill_content  input" id="orderNumber" name="email" required="" type="text" style="border: 1px solid #c8c8c8;">
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="fontlight" style="display: inline-block;">
                                                <label for="orderNumber" class="labelfiel font-light" style="font-weight: bold;">Subject</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <input class="fill_content  input" id="orderNumber" name="subject" required="" type="text" style="border: 1px solid #c8c8c8;">
                                        </div>
                                    </div>
                                </div>
                                <div class="  field">
                                    <div class="  above">
                                        <div class="  labels">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">Message</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                        </div>
                                    </div>
                                    <div class="  input">
                                        <div class="  tooltipWrapper">
                                            <textarea   style="border: 1px solid #c8c8c8;font-family: 'Gotham-Light';" name="message" required="" rows="10" id="message" placeholder="Please feel free to contact us, should you need more information." class="fill_content fontlight input"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="center-block" id="button_upload" style="width:130px  !important;">
                                    <button name="submit" type="submit" style="width: 100% !important;" class="button large wide secondary">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                                if(isset($_POST['submit'])){
                                    $name=$_POST['name'];
                                    echo $name;
                                   /* echo'
                                        <script>
                                            window.location = "../account/order.php?order='.$id_order.'";
                                        </script>
                                        ';    */                           
                                    exit;
                                    
                                }
                            ?>
                </div>
            </div>
        </section>
    </main>
<?php include "footer.php"; ?>  
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../js/bootsnav/bootsnav.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>

