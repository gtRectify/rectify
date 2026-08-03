
(function(){
  const items = document.querySelectorAll('.rx-reveal, .rx-stagger');
  if(!('IntersectionObserver' in window)){ items.forEach(el=>el.classList.add('in')); return; }
  const observer = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){ entry.target.classList.add('in'); observer.unobserve(entry.target); }
    });
  },{threshold:.14, rootMargin:'0px 0px -50px 0px'});
  items.forEach(el=>observer.observe(el));
  /* One open panel at a time, per accordion. Scoped to each container so the
     guide accordion and the full-width FAQ below it don't close each other's
     first item, which both render open. */
  document.querySelectorAll('.rx-faq, .rx-home-faq__list').forEach(group=>{
    const panels = group.querySelectorAll('details');
    panels.forEach(d=>{
      d.addEventListener('toggle',()=>{
        if(d.open){ panels.forEach(o=>{ if(o!==d) o.removeAttribute('open'); }); }
      });
    });
  });

  document.querySelectorAll('.rx-services').forEach((section)=>{
    const buttons = Array.from(section.querySelectorAll('[data-rx-services-tab]'));
    const panels = Array.from(section.querySelectorAll('[role="tabpanel"]'));

    if(!buttons.length || !panels.length) return;

    const showPanel = (targetId)=>{
      buttons.forEach((button)=>{
        const isActive = button.dataset.rxServicesTab === targetId;
        button.classList.toggle('is-active', isActive);
        button.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });

      panels.forEach((panel)=>{
        const isActive = panel.id === targetId;
        panel.hidden = !isActive;
        panel.classList.toggle('tab-active', isActive);
        panel.classList.toggle('tab-hidden', !isActive);
        if(isActive) panel.classList.add('in');
      });
    };

    buttons.forEach((button)=>{
      const targetId = button.dataset.rxServicesTab;

      button.addEventListener('mouseenter', ()=>showPanel(targetId));
      button.addEventListener('focus', ()=>showPanel(targetId));
      button.addEventListener('click', ()=>showPanel(targetId));
    });
  });
})();

(function(){
  function initMegaMenu(){
    const menuBar = document.querySelector('.rx-menu-bar');
    if(!menuBar) return;

    const parents = Array.from(menuBar.querySelectorAll('.rx-mega-parent'));
    if(!parents.length) return;

    const closeAll = (except)=>{
      parents.forEach((parent)=>{
        if(parent === except) return;
        parent.classList.remove('is-open');
        const link = parent.querySelector(':scope > .rx-mega-link');
        if(link) link.setAttribute('aria-expanded', 'false');
      });
    };

    parents.forEach((parent)=>{
      const link = parent.querySelector(':scope > .rx-mega-link');
      const submenu = parent.querySelector(':scope > .rx-mega-submenu');
      if(!link || !submenu) return;

      link.setAttribute('aria-haspopup', 'true');
      link.setAttribute('aria-expanded', 'false');

      parent.addEventListener('mouseenter', ()=>{
        if(window.matchMedia('(hover: hover)').matches){
          closeAll(parent);
          parent.classList.add('is-open');
          link.setAttribute('aria-expanded', 'true');
        }
      });

      parent.addEventListener('mouseleave', ()=>{
        if(window.matchMedia('(hover: hover)').matches){
          parent.classList.remove('is-open');
          link.setAttribute('aria-expanded', 'false');
        }
      });

      parent.addEventListener('focusin', ()=>{
        closeAll(parent);
        parent.classList.add('is-open');
        link.setAttribute('aria-expanded', 'true');
      });

      parent.addEventListener('focusout', (event)=>{
        if(!parent.contains(event.relatedTarget)){
          parent.classList.remove('is-open');
          link.setAttribute('aria-expanded', 'false');
        }
      });

      link.addEventListener('click', (event)=>{
        if(window.innerWidth > 860) return;

        event.preventDefault();
        const isOpen = parent.classList.contains('is-open');
        closeAll(parent);
        parent.classList.toggle('is-open', !isOpen);
        link.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
      });

      submenu.querySelectorAll('a').forEach((submenuLink)=>{
        submenuLink.addEventListener('click', (event)=>{
          event.stopPropagation();
        });
      });
    });

    document.addEventListener('click', (event)=>{
      if(!menuBar.contains(event.target)){
        closeAll();
      }
    });

    document.addEventListener('keydown', (event)=>{
      if(event.key === 'Escape'){
        closeAll();
      }
    });
  }

  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', initMegaMenu);
  } else {
    initMegaMenu();
  }
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












