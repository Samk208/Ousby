"use client";

import { motion, AnimatePresence } from "framer-motion";
import { X, ChevronLeft, ChevronRight, Download, Share2 } from "lucide-react";
import Image from "next/image";
import { useEffect, useCallback } from "react";

export interface LightboxImage {
  src: string;
  alt: string;
  caption?: string;
  category?: string;
  date?: string;
}

interface ImageLightboxProps {
  images: LightboxImage[];
  currentIndex: number | null;
  onClose: () => void;
  onNavigate: (index: number) => void;
}

export default function ImageLightbox({
  images,
  currentIndex,
  onClose,
  onNavigate,
}: ImageLightboxProps) {
  const isOpen = currentIndex !== null;
  const currentImage = isOpen ? images[currentIndex] : null;

  const handleNext = useCallback(() => {
    if (currentIndex !== null) {
      onNavigate((currentIndex + 1) % images.length);
    }
  }, [currentIndex, images.length, onNavigate]);

  const handlePrev = useCallback(() => {
    if (currentIndex !== null) {
      onNavigate((currentIndex - 1 + images.length) % images.length);
    }
  }, [currentIndex, images.length, onNavigate]);

  useEffect(() => {
    const handleKeyDown = (e: KeyboardEvent) => {
      if (!isOpen) return;
      if (e.key === "Escape") onClose();
      if (e.key === "ArrowRight") handleNext();
      if (e.key === "ArrowLeft") handlePrev();
    };

    window.addEventListener("keydown", handleKeyDown);
    return () => window.removeEventListener("keydown", handleKeyDown);
  }, [isOpen, onClose, handleNext, handlePrev]);

  if (!isOpen || !currentImage) return null;

  return (
    <AnimatePresence>
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        className="fixed inset-0 z-[120] bg-black/95 backdrop-blur-md flex flex-col justify-between p-4 md:p-8"
        onClick={onClose}
      >
        {/* Header Controls */}
        <div
          className="flex items-center justify-between z-10 text-white"
          onClick={(e) => e.stopPropagation()}
        >
          <div className="flex flex-col">
            {currentImage.category && (
              <span className="text-[11px] font-bold uppercase tracking-[0.05em] text-secondary-container">
                {currentImage.category}
              </span>
            )}
            <span className="text-[14px] text-white/70 font-mono">
              {currentIndex + 1} / {images.length}
            </span>
          </div>

          <div className="flex items-center gap-3">
            <a
              href={currentImage.src}
              download
              target="_blank"
              rel="noopener noreferrer"
              className="p-2.5 rounded-full bg-white/10 hover:bg-white/20 transition-all text-white"
              title="Télécharger l'image"
            >
              <Download size={18} />
            </a>
            <button
              onClick={() => {
                if (navigator.share) {
                  navigator.share({
                    title: currentImage.alt,
                    url: window.location.href,
                  });
                }
              }}
              className="p-2.5 rounded-full bg-white/10 hover:bg-white/20 transition-all text-white"
              title="Partager"
            >
              <Share2 size={18} />
            </button>
            <button
              onClick={onClose}
              className="p-2.5 rounded-full bg-white/10 hover:bg-white/20 transition-all text-white"
              title="Fermer (Échap)"
            >
              <X size={20} />
            </button>
          </div>
        </div>

        {/* Image Content */}
        <div
          className="relative flex-1 flex items-center justify-center my-4 overflow-hidden"
          onClick={(e) => e.stopPropagation()}
        >
          <motion.div
            key={currentIndex}
            initial={{ scale: 0.95, opacity: 0 }}
            animate={{ scale: 1, opacity: 1 }}
            exit={{ scale: 0.95, opacity: 0 }}
            transition={{ duration: 0.25 }}
            className="relative w-full h-full max-w-5xl max-h-[75vh]"
          >
            <Image
              src={currentImage.src}
              alt={currentImage.alt}
              fill
              className="object-contain"
              sizes="(max-width: 1280px) 100vw, 1280px"
              priority
            />
          </motion.div>

          {/* Nav Arrows */}
          {images.length > 1 && (
            <>
              <button
                onClick={handlePrev}
                className="absolute left-2 md:left-4 p-3 rounded-full bg-white/10 hover:bg-white/25 text-white transition-all backdrop-blur-sm"
                aria-label="Image précédente"
              >
                <ChevronLeft size={24} />
              </button>
              <button
                onClick={handleNext}
                className="absolute right-2 md:right-4 p-3 rounded-full bg-white/10 hover:bg-white/25 text-white transition-all backdrop-blur-sm"
                aria-label="Image suivante"
              >
                <ChevronRight size={24} />
              </button>
            </>
          )}
        </div>

        {/* Footer Caption */}
        <div
          className="max-w-2xl mx-auto text-center z-10 text-white"
          onClick={(e) => e.stopPropagation()}
        >
          <h3 className="font-heading text-[18px] md:text-[20px] font-semibold text-white mb-1">
            {currentImage.alt}
          </h3>
          {currentImage.caption && (
            <p className="text-[14px] text-white/70">{currentImage.caption}</p>
          )}
          {currentImage.date && (
            <p className="text-[12px] text-secondary-container mt-1 font-mono">
              {currentImage.date}
            </p>
          )}
        </div>
      </motion.div>
    </AnimatePresence>
  );
}
