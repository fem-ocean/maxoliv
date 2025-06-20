document.addEventListener("DOMContentLoaded", function () {
    console.log("typewriter is working")
    const target = document.getElementById("typewriter-text");

    setTimeout(()=>{
        if (!target || typeof Typewriter === "undefined") return;
  
        const typewriter = new Typewriter(target, {
        loop: true,
        delay: 75,
        deleteSpeed: 30
        });
  
        typewriter
        .typeString("a PMP-certified Project Manager.")
        .pauseFor(2000)
        .deleteAll()
        .typeString("a Business Analyst.")
        .pauseFor(2000)
        .deleteAll()
        .typeString("a Harvard-certified Web Developer.")
        .pauseFor(2000)
        .deleteAll()
        .start();
    },5000)
    
});
  


// document.addEventListener("DOMContentLoaded", function () {
//     const target = document.querySelector(".typewriter-target");
//     const phrases = window.typewriterData?.phrases || [];
//     let phraseIndex = 0;
//     let charIndex = 0;
//     let deleting = false;
  
//     function type() {
//       if (!target || phrases.length === 0) return;
  
//       const currentPhrase = phrases[phraseIndex];
  
//       if (!deleting) {
//         target.textContent = currentPhrase.substring(0, charIndex + 1);
//         charIndex++;
  
//         if (charIndex === currentPhrase.length) {
//           deleting = true;
//           setTimeout(type, 2000); // pause before deleting
//           return;
//         }
//       } else {
//         target.textContent = currentPhrase.substring(0, charIndex - 1);
//         charIndex--;
  
//         if (charIndex === 0) {
//           deleting = false;
//           phraseIndex = (phraseIndex + 1) % phrases.length;
//         }
//       }
  
//       setTimeout(type, deleting ? 50 : 100);
//     }
  
//     type();
//   });
  