"use client";

import AnimatedSection from "@/components/AnimatedSection";
import { motion } from "framer-motion";
import {
  ArrowRight,
  Briefcase,
  CheckCircle,
  Flag,
  Heart,
} from "lucide-react";
import Image from "next/image";
import Link from "next/link";

const TIMELINE = [
  {
    year: "2010",
    title: "Fondation du RGA",
    description:
      "Création du Rassemblement pour la Guinée (RGA), un mouvement politique engagé pour la transformation institutionnelle du pays.",
  },
  {
    year: "2015",
    title: "Expansion nationale",
    description:
      "Implantation du RGA dans plus de 20 préfectures avec des cellules locales et des coordinations régionales.",
  },
  {
    year: "2020",
    title: "Engagement communautaire",
    description:
      "Renforcement des actions sociales et développement de programmes d'accompagnement pour les communautés locales.",
  },
  {
    year: "2025",
    title: "Campagne législative nationale",
    description:
      "Campagne électorale historique à travers les 33+ préfectures, aboutissant à une mobilisation sans précédent.",
  },
  {
    year: "Mai 2026",
    title: "Élection à l'Assemblée nationale",
    description:
      "Élu Député de la République avec 70 738 voix. Prise de fonctions officielle à l'Assemblée nationale de Guinée.",
  },
];

const CONVICTIONS = [
  {
    icon: Heart,
    title: "Justice Équitable",
    description:
      "Un système judiciaire transparent et accessible à tous les citoyens guinéens, sans discrimination.",
  },
  {
    icon: Briefcase,
    title: "Croissance Inclusive",
    description:
      "Développement économique qui bénéficie à chaque Guinéen, en particulier les jeunes et les femmes entrepreneurs.",
  },
  {
    icon: Flag,
    title: "Cohésion Nationale",
    description:
      "Renforcement de l'unité nationale à travers le dialogue intercommunautaire et la solidarité entre préfectures.",
  },
];

export default function ParcoursPage() {
  return (
    <div className="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 w-full overflow-hidden">
      {/* Hero */}
      <AnimatedSection className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 mb-16 md:mb-24 items-center">
        <div className="lg:col-span-7 order-2 lg:order-1 flex flex-col gap-6">
          <div>
            <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted block mb-2">
              Biographie
            </span>
            <h1 className="font-heading text-[34px] sm:text-[42px] md:text-[50px] font-bold text-primary leading-[1.15]">
              Un Engagement Construit sur le Terrain
            </h1>
          </div>
          <p className="text-on-surface-variant text-[16px] md:text-[18px] leading-relaxed">
            Leader politique, entrepreneur social et fervent défenseur des
            valeurs républicaines, l&apos;Honorable Ansoumane Fofana incarne une
            nouvelle génération de responsables guinéens.
          </p>
          <div className="border-l-2 border-primary pl-4 py-2 flex flex-col gap-3">
            <h3 className="font-heading text-[18px] md:text-[20px] font-semibold text-deep-forest">
              Fonctions Actuelles
            </h3>
            {[
              "Député de la République de Guinée",
              "Président du RGA (depuis 2010)",
              "Membre de l'Assemblée nationale",
            ].map((item) => (
              <div
                key={item}
                className="flex items-center gap-2.5 text-on-surface-variant text-[15px]"
              >
                <CheckCircle className="text-primary shrink-0" size={16} />
                <span>{item}</span>
              </div>
            ))}
          </div>
        </div>

        <div className="lg:col-span-5 order-1 lg:order-2 flex justify-center lg:justify-end">
          <motion.div
            whileHover={{ scale: 1.02 }}
            className="relative w-full max-w-[420px] aspect-[3/4] rounded-xl overflow-hidden border border-border-elegant soft-shadow group"
          >
            <Image
              src="/images/client/fofana-poster-vision.jpg"
              alt="L'Honorable Ansoumane Fofana — Une vision, un engagement, un avenir"
              fill
              sizes="(max-width: 1024px) 100vw, 420px"
              priority
              className="object-cover group-hover:scale-105 transition-transform duration-700"
            />
            <div className="absolute inset-0 bg-gradient-to-t from-deep-forest/80 via-transparent to-transparent" />
            <div className="absolute bottom-4 left-4 right-4 text-white">
              <span className="text-[11px] font-bold uppercase tracking-[0.05em] text-secondary-container block mb-1">
                Affiche Officielle RGA
              </span>
              <p className="font-heading font-semibold text-[16px]">
                Une vision, un engagement, un avenir
              </p>
            </div>
          </motion.div>
        </div>
      </AnimatedSection>

      {/* Timeline */}
      <section className="mb-16 md:mb-24">
        <AnimatedSection className="mb-10">
          <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted block mb-2">
            Parcours
          </span>
          <h2 className="font-heading text-[30px] sm:text-[38px] font-bold text-primary">
            Chronologie d&apos;un engagement
          </h2>
        </AnimatedSection>

        <div className="relative">
          {/* Timeline line */}
          <div className="absolute left-4 md:left-8 top-0 bottom-0 w-0.5 bg-border-elegant" />

          <AnimatedSection className="flex flex-col gap-8">
            {TIMELINE.map((item, i) => (
              <motion.div
                key={item.year}
                className="relative pl-12 md:pl-20"
                initial="hidden"
                whileInView="visible"
                viewport={{ once: true }}
                variants={{
                  hidden: { x: -20, opacity: 0 },
                  visible: {
                    x: 0,
                    opacity: 1,
                    transition: {
                      duration: 0.5,
                      delay: i * 0.1,
                    },
                  },
                }}
              >
                {/* Dot */}
                <div className="absolute left-[9px] md:left-[25px] top-1.5 w-3.5 h-3.5 rounded-full bg-primary border-2 border-ivory-bg" />
                <div className="bg-surface-white border border-border-elegant rounded-lg p-6 soft-shadow hover:border-primary/30 transition-all">
                  <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-secondary mb-1 block">
                    {item.year}
                  </span>
                  <h3 className="font-heading text-[20px] font-semibold text-deep-forest mb-2">
                    {item.title}
                  </h3>
                  <p className="text-on-surface-variant text-[15px] leading-relaxed">
                    {item.description}
                  </p>
                </div>
              </motion.div>
            ))}
          </AnimatedSection>
        </div>
      </section>

      {/* Convictions */}
      <section>
        <AnimatedSection className="mb-10 text-center">
          <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted block mb-2">
            Convictions
          </span>
          <h2 className="font-heading text-[30px] sm:text-[38px] font-bold text-primary">
            Ce en quoi je crois
          </h2>
        </AnimatedSection>

        <AnimatedSection className="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
          {CONVICTIONS.map((conviction) => (
            <motion.div
              key={conviction.title}
              whileHover={{ y: -4 }}
              transition={{ type: "spring", stiffness: 400, damping: 25 }}
              className="bg-surface-white border border-border-elegant rounded-xl p-8 soft-shadow hover:border-primary/30 transition-all"
            >
              <div className="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center mb-5">
                <conviction.icon className="text-primary-container" size={24} />
              </div>
              <h3 className="font-heading text-[20px] font-semibold text-deep-forest mb-2">
                {conviction.title}
              </h3>
              <p className="text-on-surface-variant text-[15px] leading-relaxed">
                {conviction.description}
              </p>
            </motion.div>
          ))}
        </AnimatedSection>
      </section>

      {/* CTA */}
      <div className="mt-16 text-center">
        <Link
          href="/vision"
          className="inline-flex items-center gap-2 text-primary font-bold text-[14px] hover:text-deep-forest transition-colors"
        >
          Découvrir la vision complète <ArrowRight size={16} />
        </Link>
      </div>
    </div>
  );
}
