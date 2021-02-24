document.addEventListener("DOMContentLoaded",() => {
    const title = document.querySelectorAll('.js-accordion-title');
    
    for (let i = 0; i < title.length; i++){
      let titleEach = title[i];
      let content = titleEach.nextElementSibling;
      titleEach.addEventListener('click', () => {
        titleEach.classList.toggle('is-active');
        content.classList.toggle('is-open');
      });
    }
  
  });
  
  /* 下記でもOK */
  /*
    const title = document.querySelectorAll('.js-accordion-title');
  
    function toggle(){
    const content = this.nextElementSibling;
    this.classList.toggle('is-active');
    content.classList.toggle('is-open');
    }
  
    for (let i = 0; i < title.length; i ++){
      title[i].addEventListener('click', toggle)
    }
  
  */