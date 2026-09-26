"use client";

import { useState } from "react";
import { motion } from "framer-motion";
import {
  Calendar,
  Clock,
  MapPin,
  ArrowRight,
} from "lucide-react";
import AnimatedSection from "@/components/AnimatedSection";

type TabType = "upcoming" | "archive";

const EVENTS = [
  {
    id: 1,
    month: "SEP",
    day: "15",
    title: "Session parlementaire ordinaire",
    description:
      "Ouverture de la session ordinaire de l'Assemblée nationale. Ordre du jour : budget et réformes institutionnelles.",
    time: "09h00",
    location: "Assemblée nationale, Conakry",
    status: "upcoming" as const,
  },
  {
    id: 2,
    month: "SEP",
    day: "22",
    title: "Forum citoyen — Conakry",
    description:
      "Rencontre ouverte avec les citoyens de la capitale pour discuter des priorités locales et recueillir les préoccupations.",
    time: "14h00",
    location: "Palais du Peuple, Conakry",
    status: "upcoming" as const,
  },
  {
    id: 3,
    month: "OCT",
    day: "05",
    title: "Mission terrain — Labé",
    description:
      "Visite de suivi des projets communautaires dans la région de Labé. Rencontres avec les autorités locales.",
    time: "Toute la journée",
    location: "Labé, Moyenne-Guinée",
    status: "upcoming" as const,
  },
  {
    id: 4,
    month: "OCT",
    day: "20",
    title: "Conférence du RGA — Bilan semestriel",
    description:
      "Présentation du bilan d'activité du premier semestre et définition des orientations pour la suite du mandat.",
    time: "10h00",
    location: "Siège du RGA, Conakry",
    status: "upcoming" as const,
  },
  {
    id: 5,
    month: "JUIL",
    day: "28",
    title: "Assemblée générale du RGA",
    description:
      "Réunion stratégique du bureau national pour définir les priorités du second semestre.",
    time: "10h00",
    location: "Conakry",
    status: "archive" as const,
  },
  {
    id: 6,
    month: "JUIL",
    day: "10",
    title: "Vote du budget national",
    description:
      "Participation au vote du budget national avec amendements pour la santé et l'éducation.",
    time: "09h00",
    location: "Assemblée nationale, Conakry",
    status: "archive" as const,
  },
];

export default function AgendaPage() {
  const [activeTab, setActiveTab] = useState<TabType>("upcoming");

  const filteredEvents = EVENTS.filter((e) => e.status === activeTab);

  return (
    <div className="max-w-[1280px] mx-auto px-margin-page py-section-gap">
      {/* Header */}
      <AnimatedSection className="mb-12">
        <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted flex items-center gap-2">
          <Calendar size={14} /> Agenda
        </span>
        <h1 className="font-heading text-[36px] md:text-[48px] font-bold text-primary mt-2 leading-[1.15]">
          Agenda & Évènements
        </h1>
        <p className="text-on-surface-variant text-[18px] mt-4 max-w-2xl">
          Retrouvez les prochains rendez-vous parlementaires, missions terrain
          et évènements publics.
        </p>
      </AnimatedSection>

      {/* Tabs */}
      <AnimatedSection className="mb-8">
        <div className="flex gap-2">
          <button
            onClick={() => setActiveTab("upcoming")}
            className={`px-6 py-2.5 rounded-full text-[13px] font-bold uppercase tracking-[0.03em] border transition-all ${
              activeTab === "upcoming"
                ? "bg-primary text-white border-primary"
                : "bg-surface-white text-on-surface-variant border-border-elegant hover:border-primary"
            }`}
          >
            Évènements à venir
          </button>
          <button
            onClick={() => setActiveTab("archive")}
            className={`px-6 py-2.5 rounded-full text-[13px] font-bold uppercase tracking-[0.03em] border transition-all ${
              activeTab === "archive"
                ? "bg-primary text-white border-primary"
                : "bg-surface-white text-on-surface-variant border-border-elegant hover:border-primary"
            }`}
          >
            Archives
          </button>
        </div>
      </AnimatedSection>

      {/* Events List */}
      <AnimatedSection className="flex flex-col gap-5" stagger={0.1}>
        {filteredEvents.map((event) => (
          <motion.div
            key={event.id}
            whileHover={{ x: 4 }}
            transition={{ type: "spring", stiffness: 400, damping: 25 }}
            className={`bg-surface-white border border-border-elegant rounded-lg p-6 soft-shadow flex gap-6 ${
              event.status === "archive" ? "opacity-75" : ""
            }`}
          >
            {/* Date block */}
            <div className="flex flex-col items-center justify-center bg-primary-container/10 rounded-lg px-4 py-3 min-w-[70px]">
              <span className="text-[11px] font-bold uppercase tracking-[0.05em] text-text-muted">
                {event.month}
              </span>
              <span className="font-heading text-[28px] font-bold text-primary leading-none">
                {event.day}
              </span>
            </div>

            {/* Content */}
            <div className="flex-grow">
              <div className="flex items-center justify-between gap-2 mb-2">
                <h3 className="font-heading text-[18px] md:text-[20px] font-semibold text-deep-forest">
                  {event.title}
                </h3>
                {event.status === "upcoming" ? (
                  <span className="text-[10px] font-bold uppercase tracking-[0.05em] bg-primary-container/10 text-primary-container border border-primary-container/20 px-2.5 py-0.5 rounded-full shrink-0">
                    À venir
                  </span>
                ) : (
                  <span className="text-[10px] font-bold uppercase tracking-[0.05em] bg-surface-container text-text-muted px-2.5 py-0.5 rounded-full shrink-0">
                    Terminé
                  </span>
                )}
              </div>
              <p className="text-on-surface-variant text-[14px] leading-relaxed mb-3">
                {event.description}
              </p>
              <div className="flex flex-wrap items-center justify-between gap-4 text-[13px] text-text-muted">
                <div className="flex items-center gap-4">
                  <span className="flex items-center gap-1 font-mono">
                    <Clock size={14} className="text-secondary" />
                    {event.time}
                  </span>
                  <span className="flex items-center gap-1">
                    <MapPin size={14} className="text-primary-container" />
                    {event.location}
                  </span>
                </div>
                {event.status === "upcoming" && (
                  <button
                    onClick={() =>
                      alert(
                        `Évènement "${event.title}" du ${event.day} ${event.month} ajouté à votre calendrier.`
                      )
                    }
                    className="text-[12px] font-bold uppercase tracking-wider text-primary hover:text-deep-forest transition-colors flex items-center gap-1"
                  >
                    Ajouter à l&apos;agenda <ArrowRight size={12} />
                  </button>
                )}
              </div>
            </div>
          </motion.div>
        ))}

        {filteredEvents.length === 0 && (
          <p className="text-center text-text-muted py-12">
            Aucun évènement pour le moment.
          </p>
        )}
      </AnimatedSection>
    </div>
  );
}
