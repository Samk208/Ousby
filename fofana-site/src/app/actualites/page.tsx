"use client";

import AnimatedSection from "@/components/AnimatedSection";
import { AnimatePresence, motion } from "framer-motion";
import {
  ArrowRight,
  Building,
  Calendar,
  Download,
  MapPin,
  Megaphone,
  MessageSquare,
  Search,
  Users,
} from "lucide-react";
import Image from "next/image";
import { useState } from "react";

const CATEGORIES = [
  "Tous",
  "Assemblée",
  "Terrain",
  "RGA",
  "Déclarations",
  "Société",
  "Économie",
];

const NEWS = [
  {
    id: 1,
    category: "Assemblée",
    title: "Réforme du code électoral : intervention en commission",
    excerpt:
      "L'Honorable Fofana a présenté des amendements clés pour garantir la transparence du processus électoral lors de la session parlementaire.",
    date: "20 Août 2026",
    icon: Building,
    featured: true,
  },
  {
    id: 2,
    category: "Terrain",
    title: "Mission communautaire à Kankan — Compte rendu",
    excerpt:
      "Trois jours de rencontres avec les autorités locales, les chefs communautaires et la jeunesse de la région de Kankan.",
    date: "15 Août 2026",
    icon: MapPin,
    featured: false,
  },
  {
    id: 3,
    category: "RGA",
    title: "Assemblée générale du RGA — Bilan et perspectives",
    excerpt:
      "Réunion stratégique du bureau national du RGA pour définir les priorités d'action pour le second semestre 2026.",
    date: "8 Août 2026",
    icon: Users,
    featured: false,
  },
  {
    id: 4,
    category: "Déclarations",
    title: "Déclaration sur la cohésion nationale",
    excerpt:
      "Appel au dialogue et à la solidarité entre toutes les communautés de Guinée pour renforcer l'unité nationale.",
    date: "1 Août 2026",
    icon: Megaphone,
    featured: false,
  },
  {
    id: 5,
    category: "Économie",
    title: "Proposition de loi pour le soutien aux entrepreneurs",
    excerpt:
      "Présentation d'un cadre fiscal avantageux pour les jeunes entrepreneurs et les PME guinéennes.",
    date: "25 Juillet 2026",
    icon: MessageSquare,
    featured: false,
  },
  {
    id: 6,
    category: "Société",
    title: "Journée internationale de la jeunesse — Message",
    excerpt:
      "Message d'encouragement à la jeunesse guinéenne à l'occasion de la journée internationale dédiée.",
    date: "12 Juillet 2026",
    icon: Users,
    featured: false,
  },
];

const COMMUNIQUES = [
  {
    title: "Communiqué — Session extraordinaire de l'Assemblée",
    date: "18 Août 2026",
    size: "PDF · 245 Ko",
  },
  {
    title: "Communiqué — Suite de la mission à Kankan",
    date: "16 Août 2026",
    size: "PDF · 180 Ko",
  },
  {
    title: "Déclaration — Réforme électorale",
    date: "5 Août 2026",
    size: "PDF · 320 Ko",
  },
];

export default function ActualitesPage() {
  const [activeCategory, setActiveCategory] = useState("Tous");
  const [searchQuery, setSearchQuery] = useState("");

  const filteredNews = NEWS.filter((n) => {
    const matchesCategory =
      activeCategory === "Tous" || n.category === activeCategory;
    const matchesSearch =
      n.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
      n.excerpt.toLowerCase().includes(searchQuery.toLowerCase());
    return matchesCategory && matchesSearch;
  });

  return (
    <div className="max-w-[1280px] mx-auto px-margin-page py-section-gap">
      {/* Header */}
      <AnimatedSection className="mb-12">
        <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
          Actualités
        </span>
        <h1 className="font-heading text-[36px] md:text-[48px] font-bold text-primary mt-2 leading-[1.15]">
          Actualités & Communiqués
        </h1>
        <p className="text-on-surface-variant text-[18px] mt-4 max-w-2xl">
          Suivez l&apos;actualité parlementaire, les missions terrain et les
          prises de position de l&apos;Honorable Ansoumane Fofana.
        </p>
      </AnimatedSection>

      {/* Featured Article */}
      {NEWS.find((n) => n.featured) && (
        <AnimatedSection className="mb-12">
          <motion.div
            whileHover={{ y: -2 }}
            className="relative bg-deep-forest rounded-lg overflow-hidden border border-border-elegant soft-shadow"
          >
            <Image
              src="/images/press_conference_podium.jpg"
              alt="Conférence de presse assemblée"
              fill
              priority
              className="object-cover opacity-20"
            />
            <div className="absolute inset-0 bg-gradient-to-r from-deep-forest via-deep-forest/90 to-primary-container/80" />
            <div className="p-8 md:p-12 relative z-10">
              <span className="inline-block text-[11px] font-bold uppercase tracking-[0.05em] bg-secondary-container/20 text-secondary-container border border-secondary-container/30 px-3 py-1 rounded-full mb-4">
                À la une — Assemblée Nationale
              </span>
              <h2 className="font-heading text-[24px] md:text-[34px] font-bold text-white mb-3 leading-[1.2]">
                {NEWS.find((n) => n.featured)?.title}
              </h2>
              <p className="text-white/80 text-[16px] md:text-[18px] max-w-2xl mb-6 leading-relaxed">
                {NEWS.find((n) => n.featured)?.excerpt}
              </p>
              <div className="flex items-center gap-4">
                <span className="text-white/70 text-[13px] flex items-center gap-1.5 font-mono">
                  <Calendar size={14} className="text-secondary-container" />
                  {NEWS.find((n) => n.featured)?.date}
                </span>
                <button
                  onClick={() => alert("Consultation du communiqué officiel.")}
                  className="text-secondary-container font-bold text-[13px] flex items-center gap-1.5 hover:gap-2.5 transition-all uppercase tracking-wider"
                >
                  Lire l&apos;intervention complète <ArrowRight size={14} />
                </button>
              </div>
            </div>
          </motion.div>
        </AnimatedSection>
      )}

      {/* Filters & Search */}
      <AnimatedSection className="mb-8 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
        <div className="flex flex-wrap gap-2">
          {CATEGORIES.map((cat) => (
            <button
              key={cat}
              onClick={() => setActiveCategory(cat)}
              className={`px-4 py-2 rounded-full text-[13px] font-medium border transition-all ${
                activeCategory === cat
                  ? "bg-primary text-white border-primary shadow-md"
                  : "bg-surface-white text-on-surface-variant border-border-elegant hover:border-primary hover:text-primary"
              }`}
            >
              {cat}
            </button>
          ))}
        </div>

        {/* Live Search Input */}
        <div className="relative max-w-xs w-full">
          <Search
            size={16}
            className="absolute left-3.5 top-1/2 -translate-y-1/2 text-text-muted"
          />
          <input
            type="text"
            placeholder="Rechercher un article..."
            value={searchQuery}
            onChange={(e) => setSearchQuery(e.target.value)}
            className="w-full bg-surface-white border border-border-elegant rounded-full pl-10 pr-4 py-2 text-[14px] text-on-surface placeholder:text-text-muted focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"
          />
        </div>
      </AnimatedSection>

      <div className="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        {/* News Grid */}
        <div className="lg:col-span-8">
          <AnimatePresence mode="wait">
            <motion.div
              key={activeCategory}
              initial={{ opacity: 0, y: 10 }}
              animate={{ opacity: 1, y: 0 }}
              exit={{ opacity: 0, y: -10 }}
              transition={{ duration: 0.3 }}
              className="grid grid-cols-1 md:grid-cols-2 gap-gutter"
            >
              {filteredNews
                .filter((n) => !n.featured)
                .map((article) => (
                  <motion.div
                    key={article.id}
                    whileHover={{ y: -3 }}
                    transition={{
                      type: "spring",
                      stiffness: 400,
                      damping: 25,
                    }}
                    className="bg-surface-white border border-border-elegant rounded-lg p-6 soft-shadow group cursor-pointer"
                  >
                    <div className="flex items-center gap-2 mb-3">
                      <span className="text-[11px] font-bold uppercase tracking-[0.05em] bg-primary-container/10 text-primary-container px-3 py-1 rounded-full">
                        {article.category}
                      </span>
                    </div>
                    <h3 className="font-heading text-[17px] font-semibold text-deep-forest mb-2 group-hover:text-primary transition-colors">
                      {article.title}
                    </h3>
                    <p className="text-on-surface-variant text-[14px] leading-relaxed mb-3">
                      {article.excerpt}
                    </p>
                    <div className="flex items-center justify-between">
                      <span className="text-[12px] text-text-muted flex items-center gap-1">
                        <Calendar size={12} />
                        {article.date}
                      </span>
                      <span className="text-primary font-bold text-[12px] flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        Lire <ArrowRight size={12} />
                      </span>
                    </div>
                  </motion.div>
                ))}
            </motion.div>
          </AnimatePresence>
        </div>

        {/* Sidebar */}
        <aside className="lg:col-span-4 flex flex-col gap-6">
          {/* Communiqués */}
          <AnimatedSection className="bg-surface-white border border-border-elegant rounded-lg p-6 soft-shadow">
            <h3 className="font-heading text-[18px] font-semibold text-deep-forest mb-4">
              Communiqués
            </h3>
            <div className="flex flex-col gap-3">
              {COMMUNIQUES.map((comm) => (
                <div
                  key={comm.title}
                  className="flex items-start justify-between gap-3 p-3 rounded-md hover:bg-surface-container-low transition-colors cursor-pointer group"
                >
                  <div className="flex flex-col gap-1">
                    <span className="text-[14px] text-on-surface group-hover:text-primary transition-colors">
                      {comm.title}
                    </span>
                    <span className="text-[12px] text-text-muted">
                      {comm.date} · {comm.size}
                    </span>
                  </div>
                  <Download
                    className="text-text-muted group-hover:text-primary shrink-0 mt-1"
                    size={16}
                  />
                </div>
              ))}
            </div>
          </AnimatedSection>

          {/* WhatsApp CTA */}
          <AnimatedSection className="bg-[#25D366] rounded-lg p-6 text-white text-center">
            <h3 className="font-heading text-[18px] font-semibold mb-2">
              Suivez sur WhatsApp
            </h3>
            <p className="text-white/80 text-[14px] mb-4">
              Recevez les actualités directement sur WhatsApp.
            </p>
            <a
              href="https://wa.me/224627249666"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center gap-2 bg-white text-[#25D366] px-6 py-2.5 rounded-sm font-bold text-[13px] hover:bg-white/90 transition-colors"
            >
              Rejoindre le canal
            </a>
          </AnimatedSection>
        </aside>
      </div>
    </div>
  );
}
