gsap.registerPlugin(ScrollTrigger);



let sections1 = gsap.utils.toArray(".col-first > img");
let sections2 = gsap.utils.toArray(".col-second > img");

//         var scrollTween1 = gsap.to(sections1, {
//             xPercent: -100 * (sections1.length - 1),
//             ease: "none", // <-- IMPORTANT!

//          });
var scrollTween2 = gsap;

const tl = gsap.timeline({
  scrollTrigger: {
    trigger: ".home-main2",
    pin: true,
    scrub: 1,
    start: "top 30px",
    end: "+=1500px"
  }
});

tl.to(
  sections1,
  {
    yPercent: -90 * (sections1.length - 1),
    ease: "none" // <-- IMPORTANT!
  },
  0
);

tl.to(
  sections2,
  {
    yPercent: 90 * (sections2.length - 1),
    ease: "none" // <-- IMPORTANT!
  },
  0
);
gsap.to(".clip-text-img", {
  scrollTrigger: {
    trigger: ".clip-text-img",
      scrub: 3,
      end: "bottom center",
      start: "top 200px"
  },
  height: "50vh",
  width: "100%",
  borderRadius: "0"
})