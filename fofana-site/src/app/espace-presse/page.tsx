"use client";

import AnimatedSection from "@/components/AnimatedSection";
import { motion } from "framer-motion";
import {
  Camera,
  Download,
  ExternalLink,
  File,
  FileText,
  Image as ImageIcon,
  Mail,
  MessageSquare,
  Phone,
} from "lucide-react";
import Image from "next/image";

const BIO_VERSIONS = [
  { label: "Version Courte", detail: "50 mots", size: "DOCX · 12 Ko" },
  { label: "Version Standard", detail: "200 mots", size: "DOCX · 18 Ko" },
  { label: "Version Complète", detail: "500 mots", size: "DOCX · 25 Ko" },
];

const RESOURCES = [
  { label: "Portrait Officiel", format: "JPG haute résolution", icon: ImageIcon, size: "4.2 Mo", path: "/images/client/fofana-hero-suit.jpg" },
  { label: "Logo RGA", format: "SVG vectoriel", icon: File, size: "120 Ko", path: "/images/client/fofana-vision-poster.jpg" },
  { label: "Logo RGA", format: "PNG transparent", icon: ImageIcon, size: "350 Ko", path: "/images/client/fofana-depute-poster.jpg" },
  { label: "Charte Graphique", format: "PDF", icon: FileText, size: "2.1 Mo", path: "/images/client/fofana-field-community.jpg" },
];

const PRESS_PORTRAITS = [
  { title: "Portrait Officiel — Costume & Titre", src: "/images/client/fofana-hero-suit.webp" },
  { title: "Portrait Officiel — Écharpe Député National", src: "/images/client/fofana-depute-poster.webp" },
];

const COMMUNIQUES = [
  {
    month: "AOÛT",
    day: "20",
    title: "Communiqué — Session extraordinaire",
    category: "Parlementaire",
    size: "PDF · 245 Ko",
  },
  {
    month: "AOÛT",
    day: "16",
    title: "Communiqué — Mission Kankan",
    category: "Terrain",
    size: "PDF · 180 Ko",
  },
  {
    month: "AOÛT",
    day: "05",
    title: "Déclaration — Réforme électorale",
    category: "Déclaration",
    size: "PDF · 320 Ko",
  },
  {
    month: "JUIL",
    day: "28",
    title: "Communiqué — Assemblée générale RGA",
    category: "Parti",
    size: "PDF · 200 Ko",
  },
];

export default function EspacePressePage() {
  return (
    <div className="max-w-[1280px] mx-auto px-margin-page py-section-gap">
      {/* Header */}
      <AnimatedSection className="mb-12 max-w-3xl">
        <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
          Espace Presse
        </span>
        <h1 className="font-heading text-[36px] md:text-[48px] font-bold text-primary mt-2 leading-[1.15]">
          Espace Presse & Kit Média
        </h1>
        <p className="text-on-surface-variant text-[18px] mt-4 leading-relaxed">
          Ressources officielles, communiqués de presse et kit média destinés
          aux journalistes et institutions. Tous les documents sont mis à
          disposition sous licence libre pour usage éditorial.
        </p>
      </AnimatedSection>

      {/* Quick Download + Press Contact Grid */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-gutter mb-section-gap">
        {/* Downloads */}
        <AnimatedSection className="lg:col-span-2 bg-surface-white border border-border-elegant rounded-lg p-8 soft-shadow">
          <h2 className="font-heading text-[20px] font-semibold text-primary mb-6 flex items-center gap-2">
            <Download size={20} /> Accès Rapide & Biographies
          </h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {/* Bio */}
            <div className="flex flex-col gap-3 p-5 border border-border-elegant rounded-md bg-ivory-bg">
              <span className="text-[11px] font-bold uppercase tracking-[0.05em] text-text-muted mb-1">
                Biographie Officielle
              </span>
              {BIO_VERSIONS.map((bio) => (
                <motion.a
                  key={bio.label}
                  href="#"
                  onClick={(e) => {
                    e.preventDefault();
                    alert(`Téléchargement de la Biographie Officielle (${bio.label}).`);
                  }}
                  whileHover={{ x: 4 }}
                  className="flex items-center justify-between text-primary hover:text-deep-forest text-[14px] group transition-colors"
                >
                  <span>
                    {bio.label}{" "}
                    <span className="text-text-muted text-[12px]">
                      ({bio.detail})
                    </span>
                  </span>
                  <span className="flex items-center gap-1 text-[12px] text-text-muted opacity-80 group-hover:opacity-100 transition-opacity">
                    <Download size={14} /> {bio.size}
                  </span>
                </motion.a>
              ))}
            </div>

            {/* Resources */}
            <div className="flex flex-col gap-3 p-5 border border-border-elegant rounded-md bg-ivory-bg">
              <span className="text-[11px] font-bold uppercase tracking-[0.05em] text-text-muted mb-1">
                Ressources Média
              </span>
              {RESOURCES.map((res) => (
                <motion.a
                  key={`${res.label}-${res.format}`}
                  href={res.path}
                  download
                  whileHover={{ x: 4 }}
                  className="flex items-center justify-between text-primary hover:text-deep-forest text-[14px] group transition-colors"
                >
                  <span className="flex items-center gap-2">
                    <res.icon size={16} className="text-text-muted" />
                    <span>
                      {res.label}{" "}
                      <span className="text-text-muted text-[12px]">
                        ({res.format})
                      </span>
                    </span>
                  </span>
                  <span className="text-[12px] text-text-muted opacity-80 group-hover:opacity-100 transition-opacity">
                    {res.size}
                  </span>
                </motion.a>
              ))}
            </div>
          </div>
        </AnimatedSection>

        {/* Press Contact */}
        <AnimatedSection className="bg-deep-forest rounded-lg p-8 text-white flex flex-col justify-between">
          <div>
            <h3 className="font-heading text-[20px] font-semibold mb-4">
              Contact Presse
            </h3>
            <p className="text-white/70 text-[14px] leading-relaxed mb-6">
              Pour toute demande d&apos;interview, de déclaration ou de
              couverture médiatique.
            </p>
            <div className="flex flex-col gap-3">
              <div className="flex items-center gap-2 text-white/80 text-[14px]">
                <Mail size={16} className="text-secondary-container" />
                presse@rga-guinee.org
              </div>
              <div className="flex items-center gap-2 text-white/80 text-[14px]">
                <Phone size={16} className="text-secondary-container" />
                +224 628 440 873
              </div>
            </div>
          </div>
          <a
            href="https://wa.me/224628440873"
            target="_blank"
            rel="noopener noreferrer"
            className="mt-6 inline-flex items-center justify-center gap-2 bg-[#25D366] text-white px-6 py-2.5 rounded-sm font-bold text-[13px] hover:bg-[#20bd5a] transition-colors"
          >
            <MessageSquare size={16} /> Canal presse WhatsApp
          </a>
        </AnimatedSection>
      </div>

      {/* Portraits */}
      <AnimatedSection className="mb-section-gap">
        <h2 className="font-heading text-[24px] font-bold text-primary mb-6">
          Portraits Officiels HD
        </h2>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-gutter">
          {PRESS_PORTRAITS.map((portrait) => (
            <motion.a
              key={portrait.title}
              href={portrait.src}
              download
              whileHover={{ scale: 1.01 }}
              className="relative aspect-[3/4] bg-surface-variant rounded-lg overflow-hidden border border-border-elegant group cursor-pointer shadow-md"
            >
              <Image
                src={portrait.src}
                alt={portrait.title}
                fill
                className="object-cover group-hover:scale-105 transition-transform duration-700"
              />
              <div className="absolute inset-0 bg-deep-forest/70 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center p-4 text-center">
                <Download size={28} className="text-secondary-container mb-2" />
                <span className="text-[14px] font-bold text-white font-heading mb-1">
                  {portrait.title}
                </span>
                <span className="text-[12px] text-white/80 font-mono">
                  Format haute définition (300 DPI)
                </span>
              </div>
            </motion.a>
          ))}
        </div>
      </AnimatedSection>

      {/* Communiqués */}
      <AnimatedSection>
        <h2 className="font-heading text-[24px] font-bold text-primary mb-6">
          Communiqués de Presse
        </h2>
        <div className="flex flex-col gap-3">
          {COMMUNIQUES.map((comm) => (
            <motion.div
              key={comm.title}
              whileHover={{ x: 4 }}
              className="bg-surface-white border border-border-elegant rounded-lg p-5 soft-shadow flex items-center gap-5 cursor-pointer group"
            >
              {/* Date */}
              <div className="flex flex-col items-center justify-center bg-primary-container/10 rounded-lg px-3 py-2 min-w-[60px]">
                <span className="text-[10px] font-bold uppercase text-text-muted">
                  {comm.month}
                </span>
                <span className="font-heading text-[22px] font-bold text-primary leading-none">
                  {comm.day}
                </span>
              </div>

              {/* Content */}
              <div className="flex-grow">
                <div className="flex items-center gap-2 mb-1">
                  <h4 className="text-[15px] font-semibold text-deep-forest group-hover:text-primary transition-colors">
                    {comm.title}
                  </h4>
                  <span className="text-[10px] font-bold uppercase tracking-[0.05em] bg-secondary-container/20 text-secondary px-2 py-0.5 rounded-full">
                    {comm.category}
                  </span>
                </div>
                <span className="text-[12px] text-text-muted">{comm.size}</span>
              </div>

              <Download
                size={18}
                className="text-text-muted group-hover:text-primary shrink-0"
              />
            </motion.div>
          ))}
        </div>
      </AnimatedSection>
    </div>
  );
}
