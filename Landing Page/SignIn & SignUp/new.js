const imgDiv= document.querySelector('.pic');
const img= document.querySelector('#photo');
const file= document.querySelector('#file');
const uploadBtn=document.querySelector('#uploadBtn');

//if user hovers on the image div

imgDiv.addEventListener('mouseenter', function()
{
    uploadBtn.style.display="block"
});

imgDiv.addEventListener('mouseleave', function()
{
    uploadBtn.style.display="none"
});

// Display image when uploaded

file.addEventListener('change', function(){
    const chooseFile= this.files[0];

    if(chooseFile){
        const reader= new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(chooseFile);

    }
})