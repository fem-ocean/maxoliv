document.addEventListener("DOMContentLoaded", function () {
    // console.log("typewriter is working")
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
  
