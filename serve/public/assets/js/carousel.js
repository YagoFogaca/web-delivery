const OPTIONS = {
    slidesToScroll: "auto",
    containScroll: "trimSnaps",
};

const emblaNode = document.querySelector(".embla");
const viewportNode = emblaNode.querySelector(".embla__viewport");

const emblaApi = EmblaCarousel(viewportNode, OPTIONS);
