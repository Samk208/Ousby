"use client";

import AnimatedCounter from "@/components/AnimatedCounter";
import AnimatedSection from "@/components/AnimatedSection";
import { motion } from "framer-motion";
import {
  FileText,
  Landmark,
  MapPin,
  MessageSquare,
  Vote,
} from "lucide-react";
import Image from "next/image";
import { useState } from "react";

const STATS = [
  { target: 124, label: "Interventions", icon: MessageSquare },
  { target: 45, label: "Propositions de loi", icon: FileText },
  { target: 89, label: "Votes clés", icon: Vote },
  { target: 32, label: "Missions terrain", icon: MapPin },
];

const ACTIVITIES = [
  {
    type: "Intervention",
    theme: "Éducation",
    title: "Débat sur la réforme du système éducatif national",
    date: "15 Juillet 2026",
    status: "Publié",
    excerpt:
      "Intervention en séance plénière sur la modernisation du curriculum scolaire et la formation des enseignants.",
  },
  {
    type: "Proposition de loi",
    theme: "Économie",
    title: "Loi portant soutien aux PME et startups guinéennes",
    date: "28 Juin 2026",
    status: "En commission",
    excerpt:
      "Proposition de loi visant à créer un cadre fiscal favorable au développement des petites et moyennes entreprises.",
  },
  {
    type: "Vote",
    theme: "Gouvernance",
    title: "Vote du budget national 2026-2027",
    date: "10 Juin 2026",
    status: "Adopté",
    excerpt:
      "Participation au vote du budget national avec amendements pour renforcer les allocations santé et éducation.",
  },
  {
    type: "Mission terrain",
    theme: "Social",
    title: "Visite de suivi des projets communautaires — Kindia",
    date: "22 Mai 2026",
    status: "Terminé",
    excerpt:
      "Mission de terrain pour évaluer l'avancement des projets d'infrastructure et rencontrer les leaders locaux.",
  },
];

const THEMES = [
  "Tous",
  "Éducation",
  "Économie",
  "Gouvernance",
  "Santé",
  "Social",
  "Sécurité",
];

export default function MandatPage() {
  const [selectedTheme, setSelectedTheme] = useState("Tous");

  const filteredActivities =
    selectedTheme === "Tous"
      ? ACTIVITIES
      : ACTIVITIES.filter((a) => a.theme === selectedTheme);

  return (
    <div>
      {/* Hero */}
      <section className="relative w-full h-[45vh] md:h-[50vh] flex items-center justify-center overflow-hidden border-b border-border-elegant">
        <Image
          src="/images/parliament_hemicycle.jpg"
          alt="Hémicycle de l'Assemblée Nationale"
          fill
          priority
          className="object-cover opacity-25"
        />
        <div className="absolute inset-0 bg-gradient-to-br from-deep-forest via-deep-forest/90 to-primary-container/90" />
        <div className="glow-spot w-[400px] h-[400px] bg-secondary-container top-[-100px] right-[-100px]" />
        <div className="relative z-10 text-center px-margin-page max-w-[1280px] mx-auto">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.7 }}
          >
            <div className="inline-flex items-center justify-center p-3 rounded-full bg-secondary-container/10 border border-secondary-container/30 mb-4 backdrop-blur-sm">
              <Landmark className="text-secondary-container" size={32} />
            </div>
            <h1 className="font-heading text-[36px] md:text-[52px] font-bold text-white mb-3 leading-[1.15]">
              Mon mandat de député
            </h1>
            <p className="text-white/85 text-[18px] md:text-[20px] max-w-2xl mx-auto font-heading">
              Transparence, rigueur et engagement à l&apos;Assemblée nationale de Guinée.
            </p>
          </motion.div>
        </div>
      </section>

      {/* Dashboard Stats */}
      <section className="py-section-gap px-margin-page">
        <div className="max-w-[1280px] mx-auto">
          <AnimatedSection className="grid grid-cols-2 md:grid-cols-4 gap-gutter mb-16">
            {STATS.map((stat) => (
              <motion.div
                key={stat.label}
                whileHover={{ y: -4 }}
                className="bg-surface-white p-8 border border-border-elegant rounded-lg flex flex-col items-center text-center soft-shadow"
              >
                <stat.icon
                  className="text-primary-container mb-3"
                  size={28}
                />
                <AnimatedCounter
                  target={stat.target}
                  className="font-body text-[40px] font-extrabold text-secondary leading-[40px] mb-1"
                />
                <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
                  {stat.label}
                </span>
              </motion.div>
            ))}
          </AnimatedSection>

          {/* Activity Feed */}
          <AnimatedSection className="mb-8">
            <h2 className="font-heading text-[28px] font-bold text-primary mb-2">
              Activité parlementaire
            </h2>
            <p className="text-on-surface-variant text-[16px]">
              Suivez les interventions, propositions et votes à l&apos;Assemblée
              nationale.
            </p>
          </AnimatedSection>

          {/* Filters */}
          <AnimatedSection className="mb-8">
            <div className="flex flex-wrap gap-2">
              {THEMES.map((theme) => (
                <button
                  key={theme}
                  onClick={() => setSelectedTheme(theme)}
                  className={`px-4 py-2 rounded-full text-[13px] font-medium border transition-all ${
                    selectedTheme === theme
                      ? "bg-primary text-white border-primary shadow-md"
                      : "bg-surface-white text-on-surface-variant border-border-elegant hover:border-primary hover:text-primary"
                  }`}
                >
                  {theme}
                </button>
              ))}
            </div>
          </AnimatedSection>

          {/* Activities */}
          <AnimatedSection className="grid grid-cols-1 md:grid-cols-2 gap-gutter" stagger={0.08}>
            {filteredActivities.map((activity) => (
              <motion.div
                key={activity.title}
                whileHover={{ y: -3 }}
                transition={{ type: "spring", stiffness: 400, damping: 25 }}
                className="bg-surface-white border border-border-elegant rounded-lg p-6 soft-shadow group"
              >
                <div className="flex items-center gap-2 mb-3">
                  <span className="text-[11px] font-bold uppercase tracking-[0.05em] bg-primary-container/10 text-primary-container px-3 py-1 rounded-full">
                    {activity.type}
                  </span>
                  <span className="text-[11px] font-bold uppercase tracking-[0.05em] bg-secondary-container/20 text-secondary px-3 py-1 rounded-full">
                    {activity.theme}
                  </span>
                </div>
                <h3 className="font-heading text-[18px] font-semibold text-deep-forest mb-2 group-hover:text-primary transition-colors">
                  {activity.title}
                </h3>
                <p className="text-on-surface-variant text-[14px] leading-relaxed mb-3">
                  {activity.excerpt}
                </p>
                <div className="flex items-center justify-between">
                  <span className="text-[12px] text-text-muted">
                    {activity.date}
                  </span>
                  <span className="text-[11px] font-bold uppercase tracking-[0.05em] text-primary bg-primary/5 px-2 py-1 rounded">
                    {activity.status}
                  </span>
                </div>
              </motion.div>
            ))}
          </AnimatedSection>
        </div>
      </section>
    </div>
  );
}
