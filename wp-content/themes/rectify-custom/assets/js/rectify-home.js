
(function(){
  const items = document.querySelectorAll('.rx-reveal, .rx-stagger');
  if(!('IntersectionObserver' in window)){ items.forEach(el=>el.classList.add('in')); return; }
  const observer = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){ entry.target.classList.add('in'); observer.unobserve(entry.target); }
    });
  },{threshold:.14, rootMargin:'0px 0px -50px 0px'});
  items.forEach(el=>observer.observe(el));
  document.querySelectorAll('.rx-faq details').forEach(d=>{
    d.addEventListener('toggle',()=>{
      if(d.open){ document.querySelectorAll('.rx-faq details').forEach(o=>{ if(o!==d) o.removeAttribute('open'); }); }
    });
  });
})();

(function(){
  function initRectifySliders(){
    const sliders = document.querySelectorAll('.rx-performance .rx-slider');

    sliders.forEach((sliderRoot)=>{
      if(sliderRoot.dataset.rxSliderReady === '1') return;

      const slides = Array.from(sliderRoot.querySelectorAll('.rx-slider-slide'));
      const prevBtn = sliderRoot.querySelector('.rx-slider-prev');
      const nextBtn = sliderRoot.querySelector('.rx-slider-next');
      const dotIndicator = sliderRoot.querySelector('.rx-slider-dot');

      if(!slides.length) return;

      sliderRoot.dataset.rxSliderReady = '1';
      let currentIndex = slides.findIndex((slide)=>slide.classList.contains('is-active'));
      if(currentIndex < 0) currentIndex = 0;

      const updateSlider = (index)=>{
        currentIndex = (index + slides.length) % slides.length;
        slides.forEach((slide, idx)=>{
          const isActive = idx === currentIndex;
          slide.classList.toggle('is-active', isActive);
          slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
        });

        if(dotIndicator){
          dotIndicator.style.width = `${10 + (currentIndex * 8)}px`;
        }
      };

      const AUTOPLAY_DELAY = 4000;
      let autoplayTimer = null;

      const stopAutoplay = ()=>{
        if(autoplayTimer){ clearInterval(autoplayTimer); autoplayTimer = null; }
      };

      const startAutoplay = ()=>{
        if(slides.length < 2) return;
        stopAutoplay();
        autoplayTimer = setInterval(()=>updateSlider(currentIndex + 1), AUTOPLAY_DELAY);
      };

      const restartAutoplay = ()=>startAutoplay();

      if(prevBtn) prevBtn.addEventListener('click', ()=>{ updateSlider(currentIndex - 1); restartAutoplay(); });
      if(nextBtn) nextBtn.addEventListener('click', ()=>{ updateSlider(currentIndex + 1); restartAutoplay(); });

      sliderRoot.addEventListener('mouseenter', stopAutoplay);
      sliderRoot.addEventListener('mouseleave', startAutoplay);
      sliderRoot.addEventListener('focusin', stopAutoplay);
      sliderRoot.addEventListener('focusout', startAutoplay);

      updateSlider(currentIndex);
      startAutoplay();
    });
  }

  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', initRectifySliders);
  } else {
    initRectifySliders();
  }
})();

(function(){
  function initResourcesParallax(){
    const section = document.querySelector('.rx-resources');
    const disableMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    if(!section) return;

    if(disableMotion.matches){
      section.style.removeProperty('--rx-resources-parallax');
      return;
    }

    let isVisible = false;
    let framePending = false;

    const render = ()=>{
      const rect = section.getBoundingClientRect();
      const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
      const progress = Math.max(0, Math.min(1, (viewportHeight - rect.top) / (viewportHeight + rect.height)));
      const offset = (0.5 - progress) * 60;

      section.style.setProperty('--rx-resources-parallax', `${offset.toFixed(2)}px`);
      framePending = false;
    };

    const requestRender = ()=>{
      if(!isVisible || framePending) return;
      framePending = true;
      window.requestAnimationFrame(render);
    };

    if('IntersectionObserver' in window){
      const observer = new IntersectionObserver((entries)=>{
        entries.forEach((entry)=>{
          isVisible = entry.isIntersecting;
          if(isVisible) requestRender();
        });
      }, {rootMargin: '120px 0px'});

      observer.observe(section);
    } else {
      isVisible = true;
    }

    window.addEventListener('scroll', requestRender, {passive: true});
    window.addEventListener('resize', requestRender, {passive: true});
    requestRender();
  }

  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', initResourcesParallax);
  } else {
    initResourcesParallax();
  }
})();
