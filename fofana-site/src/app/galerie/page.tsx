"use client";

import AnimatedSection from "@/components/AnimatedSection";
import ImageLightbox, { LightboxImage } from "@/components/ImageLightbox";
import { motion, AnimatePresence } from "framer-motion";
import { Camera, Eye, Film, Play, X } from "lucide-react";
import Image from "next/image";
import { useState } from "react";

const PHOTOS = [
  {
    id: 1,
    src: "/images/client/fofana-depute-poster.jpg",
    alt: "Session plénière — Assemblée nationale",
    title: "Session plénière — Assemblée nationale",
    caption: "Débat parlementaire en présence des députés de la nation à Conakry.",
    category: "Assemblée",
    date: "Août 2026",
    span: "md:col-span-2 md:row-span-2",
    aspect: "aspect-square",
  },
  {
    id: 2,
    src: "/images/client/fofana-traditional-boubou.jpg",
    alt: "Tenue traditionnelle — Cérémonie officielle",
    title: "Tenue traditionnelle — Cérémonie officielle",
    caption: "L'Honorable Ansoumane Fofana en grande tenue traditionnelle guinéenne.",
    category: "Culture & Tradition",
    date: "Août 2026",
    span: "md:col-span-1",
    aspect: "aspect-[4/3]",
  },
  {
    id: 3,
    src: "/images/client/fofana-field-community.jpg",
    alt: "Rencontre communautaire dans les préfectures",
    title: "Rencontre communautaire préfectures",
    caption: "Dialogue direct avec les citoyens et les sages locaux.",
    category: "Terrain",
    date: "Juillet 2026",
    span: "md:col-span-1",
    aspect: "aspect-[4/3]",
  },
  {
    id: 4,
    src: "/images/parliament_hemicycle.jpg",
    alt: "Travaux en commission parlementaire",
    title: "Travaux en commission parlementaire",
    caption: "Étude et amendement des projets de loi à l'Assemblée nationale.",
    category: "Gouvernance",
    date: "Juillet 2026",
    span: "md:col-span-2",
    aspect: "aspect-[21/9]",
  },
  {
    id: 5,
    src: "/images/guinea_youth_education.jpg",
    alt: "Forum Jeunesse, Innovation & Emploi",
    title: "Forum Jeunesse, Innovation & Emploi",
    caption: "Échanges passionnants avec les jeunes entrepreneurs et étudiants guinéens.",
    category: "Jeunesse",
    date: "Juin 2026",
    span: "md:col-span-1",
    aspect: "aspect-[4/3]",
  },
  {
    id: 6,
    src: "/images/client/fofana-poster-vision.jpg",
    alt: "Affiche Officielle — Une vision, un engagement, un avenir",
    title: "Affiche Officielle RGA",
    caption: "Engagé pour la Guinée — RGA.",
    category: "Institutionnel",
    date: "Mai 2026",
    span: "md:col-span-1",
    aspect: "aspect-[4/3]",
  },
];

const REELS = [
  {
    id: 1,
    title: "Intervention plénière sur la loi finances 2026",
    views: "14.2K",
    videoUrl: "https://www.youtube.com/embed/dQw4w9WgXcQ",
    bg: "/images/parliament_hemicycle.jpg",
  },
  {
    id: 2,
    title: "Visite de terrain & projets Kindia",
    views: "8.5K",
    videoUrl: "https://www.youtube.com/embed/dQw4w9WgXcQ",
    bg: "/images/client/fofana-field-community.jpg",
  },
  {
    id: 3,
    title: "Message à la jeunesse guinéenne — RGA",
    views: "22.1K",
    videoUrl: "https://www.youtube.com/embed/dQw4w9WgXcQ",
    bg: "/images/guinea_youth_education.jpg",
  },
  {
    id: 4,
    title: "Grand Meeting RGA — Mobilisation 2026",
    views: "30.8K",
    videoUrl: "https://www.youtube.com/embed/dQw4w9WgXcQ",
    bg: "/images/client/fofana-field-rally.jpg",
  },
];

export default function GaleriePage() {
  const [lightboxIndex, setLightboxIndex] = useState<number | null>(null);
  const [activeReel, setActiveReel] = useState<typeof REELS[0] | null>(null);

  const lightboxImages: LightboxImage[] = PHOTOS.map((p) => ({
    src: p.src,
    alt: p.alt,
    caption: p.caption,
    category: p.category,
    date: p.date,
  }));

  return (
    <div className="max-w-[1280px] mx-auto px-margin-page py-section-gap">
      {/* Header */}
      <AnimatedSection className="mb-12">
        <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted flex items-center gap-2">
          <Camera size={14} className="text-secondary" /> Galerie Photos & Vidéos
        </span>
        <h1 className="font-heading text-[36px] md:text-[48px] font-bold text-primary mt-2 leading-[1.15]">
          Galerie Officielle
        </h1>
        <p className="text-on-surface-variant text-[18px] mt-4 max-w-2xl">
          Moments fort de l&apos;engagement parlementaire, des missions terrain et des rassemblements citoyens.
        </p>
      </AnimatedSection>

      {/* Photo Grid — Bento Layout */}
      <AnimatedSection className="grid grid-cols-1 md:grid-cols-4 gap-4 mb-section-gap" stagger={0.06}>
        {PHOTOS.map((photo, index) => (
          <motion.div
            key={photo.id}
            onClick={() => setLightboxIndex(index)}
            whileHover={{ scale: 1.01 }}
            className={`${photo.span} ${photo.aspect} relative bg-surface-variant rounded-lg overflow-hidden group cursor-pointer border border-border-elegant shadow-md`}
          >
            <Image
              src={photo.src}
              alt={photo.alt}
              fill
              sizes="(max-width: 768px) 100vw, 50vw"
              className="object-cover group-hover:scale-105 transition-transform duration-700"
            />
            {/* Hover overlay */}
            <div className="absolute inset-0 bg-gradient-to-t from-deep-forest/90 via-deep-forest/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-5">
              <span className="text-[11px] font-bold uppercase tracking-[0.05em] text-secondary-container mb-1 block">
                {photo.category}
              </span>
              <span className="text-white font-heading text-[18px] font-semibold leading-snug mb-1">
                {photo.title}
              </span>
              <span className="text-white/70 text-[13px] font-mono">{photo.date}</span>
            </div>
          </motion.div>
        ))}
      </AnimatedSection>

      {/* Reels Section */}
      <AnimatedSection className="mb-8">
        <h2 className="font-heading text-[28px] md:text-[34px] font-bold text-primary flex items-center gap-2 mb-2">
          <Film size={28} className="text-secondary" /> Reels & Vidéos
        </h2>
        <p className="text-on-surface-variant text-[16px]">
          Extrait vidéo des discours, missions terrain et interventions de l&apos;Honorable Fofana.
        </p>
      </AnimatedSection>

      <AnimatedSection className="grid grid-cols-2 md:grid-cols-4 gap-4" stagger={0.1}>
        {REELS.map((reel) => (
          <motion.div
            key={reel.id}
            onClick={() => setActiveReel(reel)}
            whileHover={{ y: -4, scale: 1.02 }}
            transition={{ type: "spring", stiffness: 400, damping: 25 }}
            className="relative aspect-[9/16] bg-deep-forest rounded-lg overflow-hidden group cursor-pointer border border-border-elegant shadow-lg"
          >
            <Image
              src={reel.bg}
              alt={reel.title}
              fill
              className="object-cover opacity-60 group-hover:scale-105 transition-transform duration-700"
            />
            <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent" />
            
            {/* Play button */}
            <div className="absolute inset-0 flex items-center justify-center">
              <motion.div
                whileHover={{ scale: 1.15 }}
                className="w-14 h-14 rounded-full bg-secondary-container/90 text-on-surface flex items-center justify-center shadow-xl backdrop-blur-sm"
              >
                <Play size={24} fill="currentColor" className="ml-1" />
              </motion.div>
            </div>
            {/* Bottom info */}
            <div className="absolute bottom-0 left-0 right-0 p-4 text-white">
              <h4 className="text-white text-[14px] font-heading font-semibold leading-snug mb-1">
                {reel.title}
              </h4>
              <span className="text-white/80 text-[12px] flex items-center gap-1.5 font-mono">
                <Eye size={12} className="text-secondary-container" /> {reel.views} vues
              </span>
            </div>
          </motion.div>
        ))}
      </AnimatedSection>

      {/* Lightbox Modal */}
      <ImageLightbox
        images={lightboxImages}
        currentIndex={lightboxIndex}
        onClose={() => setLightboxIndex(null)}
        onNavigate={(idx) => setLightboxIndex(idx)}
      />

      {/* Reel Video Modal */}
      <AnimatePresence>
        {activeReel && (
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            className="fixed inset-0 z-[120] bg-black/90 backdrop-blur-md flex items-center justify-center p-4"
            onClick={() => setActiveReel(null)}
          >
            <motion.div
              initial={{ scale: 0.9, opacity: 0 }}
              animate={{ scale: 1, opacity: 1 }}
              exit={{ scale: 0.9, opacity: 0 }}
              className="relative w-full max-w-sm aspect-[9/16] bg-black rounded-xl overflow-hidden shadow-2xl border border-white/20"
              onClick={(e) => e.stopPropagation()}
            >
              <button
                onClick={() => setActiveReel(null)}
                className="absolute top-4 right-4 z-20 p-2 rounded-full bg-black/60 text-white hover:bg-black transition-all"
              >
                <X size={20} />
              </button>
              <div className="absolute inset-0 flex flex-col justify-between p-6 z-10 bg-gradient-to-t from-black via-transparent to-black/60">
                <span className="text-secondary-container text-xs font-bold uppercase tracking-wider">
                  Reel Vidéo
                </span>
                <div>
                  <h3 className="font-heading text-white font-semibold text-lg mb-2">
                    {activeReel.title}
                  </h3>
                  <p className="text-white/70 text-xs font-mono">
                    {activeReel.views} vues — Assemblée Nationale & Terrain
                  </p>
                </div>
              </div>
              <Image
                src={activeReel.bg}
                alt={activeReel.title}
                fill
                className="object-cover opacity-50"
              />
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
