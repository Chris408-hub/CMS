// aboutMe-Page.js
//adding greenSock SplitText
    

export function textAnimation() {

  gsap.registerPlugin(SplitText);
  const titles = document.querySelectorAll('span');
  titles.forEach(title => {

    const split = new SplitText(title, { type: 'chars' });

    const typingText = gsap.timeline()
      .from(split.chars, {
        duration: 1.6,
        autoAlpha: 0,
        stagger: {
          each: .3
        }
      });
  });

};