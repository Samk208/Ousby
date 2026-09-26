"use client";

import AnimatedSection from "@/components/AnimatedSection";
import { motion } from "framer-motion";
import {
  ArrowRight,
  BookOpen,
  Building2,
  Download,
  Factory,
  Globe,
  GraduationCap,
  HeartPulse,
  Leaf,
  Lock,
  Plane,
  Scale,
  Shield,
  ShieldCheck,
  Stethoscope,
  TrendingUp,
  Users,
} from "lucide-react";
import Image from "next/image";
import Link from "next/link";

const VALUES = [
  { icon: Scale, title: "Vérité", color: "text-primary-container" },
  { icon: Shield, title: "Loyauté", color: "text-secondary" },
  { icon: HeartPulse, title: "Paix", color: "text-tertiary" },
];

const STRATEGIC_AXES = [
  {
    icon: Building2,
    title: "Gouvernance & Institutions",
    description:
      "Réforme constitutionnelle, décentralisation effective, lutte contre la corruption, modernisation de l'administration publique.",
    span: "md:col-span-8",
  },
  {
    icon: GraduationCap,
    title: "Éducation & Formation",
    description:
      "Réforme du système éducatif, formation professionnelle, accès universel à l'école.",
    span: "md:col-span-4",
  },
  {
    icon: Factory,
    title: "Économie & Emploi",
    description:
      "Industrialisation locale, soutien aux PME, économie numérique, emploi des jeunes.",
    span: "md:col-span-4",
  },
  {
    icon: Globe,
    title: "Diplomatie & Diaspora",
    description:
      "Diplomatie économique active, mobilisation de la diaspora, partenariats stratégiques Sud-Sud.",
    span: "md:col-span-8",
  },
  {
    icon: Stethoscope,
    title: "Santé Publique",
    description:
      "Couverture sanitaire universelle, infrastructures hospitalières, accès aux médicaments.",
    span: "md:col-span-6",
  },
  {
    icon: ShieldCheck,
    title: "Sécurité & Défense",
    description:
      "Modernisation des forces de défense, sécurité civile, lutte antiterrorisme régionale.",
    span: "md:col-span-6",
  },
];

const PRIORITIES = [
  {
    icon: Building2,
    title: "Gouvernance",
    items: [
      "Réforme constitutionnelle participative",
      "Décentralisation effective des pouvoirs",
      "Digitalisation de l'administration",
      "Transparence budgétaire totale",
    ],
  },
  {
    icon: GraduationCap,
    title: "Éducation",
    items: [
      "École gratuite et obligatoire 6-16 ans",
      "Formation professionnelle technique",
      "Bourses d'excellence nationales",
      "Partenariats universitaires internationaux",
    ],
  },
  {
    icon: TrendingUp,
    title: "Économie",
    items: [
      "Fonds national d'investissement",
      "Zones économiques spéciales",
      "Soutien aux PME et startups",
      "Valorisation des ressources minières",
    ],
  },
  {
    icon: Globe,
    title: "Diplomatie",
    items: [
      "Diplomatie économique bilatérale",
      "Réseau diaspora structuré",
      "Coopération régionale CEDEAO",
      "Partenariats Sud-Sud stratégiques",
    ],
  },
  {
    icon: HeartPulse,
    title: "Santé",
    items: [
      "Hôpitaux de référence régionaux",
      "Assurance maladie universelle",
      "Formation du personnel soignant",
      "Accès aux médicaments essentiels",
    ],
  },
  {
    icon: ShieldCheck,
    title: "Sécurité",
    items: [
      "Modernisation des forces armées",
      "Sécurité civile et protection",
      "Cybersécurité nationale",
      "Coopération antiterrorisme",
    ],
  },
];

export default function VisionPage() {
  return (
    <div>
      {/* Hero */}
      <section className="relative py-24 px-margin-page bg-surface overflow-hidden border-b border-border-elegant">
        <div className="glow-spot w-[400px] h-[400px] bg-primary-container top-[-100px] left-[-100px]" />
        <div className="max-w-[1280px] mx-auto text-center relative z-10">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.7 }}
          >
            <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
              Vision 2025–2030
            </span>
            <h1 className="font-heading text-[36px] md:text-[48px] font-bold text-primary mt-3 mb-4 leading-[1.15]">
              Pour une Guinée Méthodique et Solidaire
            </h1>
            <p className="text-on-surface-variant text-[18px] max-w-2xl mx-auto leading-relaxed">
              Un cadre de réformes structuré autour de 15 axes stratégiques
              pour transformer la Guinée en une nation moderne, juste et
              prospère.
            </p>
          </motion.div>
        </div>
      </section>

      {/* Values */}
      <section className="py-section-gap px-margin-page">
        <div className="max-w-[1280px] mx-auto">
          <AnimatedSection className="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-section-gap">
            {VALUES.map((value) => (
              <motion.div
                key={value.title}
                whileHover={{ y: -4 }}
                className="bg-surface-white border border-border-elegant rounded-lg p-8 text-center soft-shadow"
              >
                <value.icon className={`${value.color} mx-auto mb-4`} size={36} />
                <h3 className="font-heading text-[24px] font-semibold text-deep-forest">
                  {value.title}
                </h3>
              </motion.div>
            ))}
          </AnimatedSection>

          {/* Strategic Axes — Bento Grid */}
          <AnimatedSection className="mb-8">
            <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
              Cadre Stratégique
            </span>
            <h2 className="font-heading text-[32px] font-bold text-primary mt-2 mb-2">
              Axes Stratégiques
            </h2>
            <p className="text-on-surface-variant text-[16px] mb-8">
              Les piliers d&apos;une transformation nationale cohérente et
              ambitieuse.
            </p>
          </AnimatedSection>

          <AnimatedSection className="grid grid-cols-1 md:grid-cols-12 gap-gutter mb-section-gap" stagger={0.08}>
            {STRATEGIC_AXES.map((axis) => (
              <motion.div
                key={axis.title}
                whileHover={{ y: -3 }}
                transition={{ type: "spring", stiffness: 400, damping: 25 }}
                className={`${axis.span} bg-surface-white border border-border-elegant rounded-lg p-6 soft-shadow group relative overflow-hidden`}
              >
                <div className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-primary-container opacity-0 group-hover:opacity-100 transition-opacity" />
                <axis.icon
                  className="text-primary-container mb-3"
                  size={28}
                />
                <h3 className="font-heading text-[20px] font-semibold text-deep-forest mb-2 group-hover:text-primary transition-colors">
                  {axis.title}
                </h3>
                <p className="text-on-surface-variant text-[15px] leading-relaxed">
                  {axis.description}
                </p>
              </motion.div>
            ))}
          </AnimatedSection>

          {/* Priorities */}
          <AnimatedSection className="mb-8">
            <h2 className="font-heading text-[28px] font-bold text-primary mb-2">
              6 Priorités d&apos;Action
            </h2>
            <p className="text-on-surface-variant text-[16px]">
              Les domaines clés pour une mise en œuvre effective des réformes.
            </p>
          </AnimatedSection>

          <AnimatedSection className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter" stagger={0.08}>
            {PRIORITIES.map((priority) => (
              <div
                key={priority.title}
                className="bg-surface-white border border-border-elegant rounded-lg p-6 soft-shadow"
              >
                <div className="flex items-center gap-3 mb-4">
                  <div className="w-10 h-10 rounded-full bg-primary-container/10 flex items-center justify-center">
                    <priority.icon className="text-primary-container" size={20} />
                  </div>
                  <h3 className="font-heading text-[18px] font-semibold text-deep-forest">
                    {priority.title}
                  </h3>
                </div>
                <ul className="flex flex-col gap-2">
                  {priority.items.map((item) => (
                    <li
                      key={item}
                      className="flex items-start gap-2 text-on-surface-variant text-[14px]"
                    >
                      <span className="w-1.5 h-1.5 rounded-full bg-secondary-container mt-2 shrink-0" />
                      {item}
                    </li>
                  ))}
                </ul>
              </div>
            ))}
          </AnimatedSection>

          {/* Download CTA */}
          <div className="mt-section-gap">
            <AnimatedSection>
              <div className="relative rounded-xl overflow-hidden border border-border-elegant bg-deep-forest p-8 md:p-12 text-white soft-shadow">
                <Image
                  src="/images/client/fofana-vision-poster.webp"
                  alt="Programme de Vision L'Honorable Ansoumane Fofana"
                  fill
                  className="object-cover opacity-25"
                />
                <div className="absolute inset-0 bg-gradient-to-r from-deep-forest via-deep-forest/90 to-primary-container/80" />
                <div className="relative z-10 max-w-2xl">
                  <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-secondary-container mb-2 block">
                    Document officiel
                  </span>
                  <h3 className="font-heading text-[28px] md:text-[36px] font-bold text-white mb-4">
                    Téléchargez le Programme de Vision (2025–2030)
                  </h3>
                  <p className="text-white/80 text-[16px] mb-6 leading-relaxed">
                    Retrouvez l&apos;intégralité des 15 axes stratégiques et des 6 priorités d&apos;action formulées par le RGA pour la modernisation de la Guinée.
                  </p>
                  <motion.a
                    href="#"
                    onClick={(e) => {
                      e.preventDefault();
                      alert("Le téléchargement du programme complet (PDF) va démarrer.");
                    }}
                    whileHover={{ scale: 1.03 }}
                    whileTap={{ scale: 0.98 }}
                    className="inline-flex items-center gap-2 bg-secondary-container text-on-surface px-8 py-3.5 rounded-sm font-bold text-[13px] uppercase tracking-[0.03em] hover:bg-secondary-container/90 transition-all shadow-lg"
                  >
                    <Download size={16} />
                    Télécharger le Programme PDF (23 pages)
                  </motion.a>
                </div>
              </div>
            </AnimatedSection>
          </div>
        </div>
      </section>
    </div>
  );
}
