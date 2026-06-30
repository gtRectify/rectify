
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
