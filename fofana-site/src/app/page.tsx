"use client";

import AnimatedCounter from "@/components/AnimatedCounter";
import AnimatedSection from "@/components/AnimatedSection";
import { motion, useScroll, useTransform } from "framer-motion";
import {
  ArrowRight,
  CalendarCheck,
  ChevronDown,
  Heart,
  Landmark,
  MapPin,
  Scale,
  Shield,
  Users,
} from "lucide-react";
import Image from "next/image";
import Link from "next/link";

const STATS = [
  { target: 70738, label: "Voix obtenues", icon: Users, suffix: "" },
  { target: 1, label: "Député national", icon: Landmark, suffix: "" },
  { target: 27, label: "Conseillers communaux", icon: Users, suffix: "" },
  { target: 33, label: "Préfectures couvertes", icon: MapPin, suffix: "+" },
  { target: 2010, label: "Engagement depuis", icon: CalendarCheck, suffix: "" },
];

const VALUES = [
  {
    icon: Scale,
    title: "Vérité",
    description:
      "Transparence totale dans l'action publique. Rendre des comptes au peuple, toujours.",
  },
  {
    icon: Shield,
    title: "Loyauté",
    description:
      "Fidélité aux valeurs républicaines et engagement indéfectible envers la nation guinéenne.",
  },
  {
    icon: Heart,
    title: "Paix",
    description:
      "Construire des ponts entre les communautés pour une Guinée unie et solidaire.",
  },
];

export default function HomePage() {
  const { scrollY } = useScroll();
  const heroOpacity = useTransform(scrollY, [0, 500], [1, 0.3]);
  const heroScale = useTransform(scrollY, [0, 500], [1, 1.05]);

  return (
    <div className="w-full overflow-hidden">
      {/* ===== HERO ===== */}
      <section className="relative min-h-[85vh] flex items-center overflow-hidden">
        <motion.div
          style={{ opacity: heroOpacity, scale: heroScale }}
          className="absolute inset-0 w-full h-full"
        >
          <Image
            src="/images/client/fofana-hero-suit.webp"
            alt="L'Honorable Ansoumane Fofana"
            fill
            sizes="100vw"
            priority
            className="object-cover object-top opacity-30 scale-105"
          />
          <div className="absolute inset-0 bg-gradient-to-r from-deep-forest via-deep-forest/90 to-primary-container/80 z-10" />
          <div className="absolute inset-0 bg-[url('/hero-pattern.svg')] opacity-5 z-20" />
        </motion.div>

        {/* Floating particles */}
        {[...Array(6)].map((_, i) => (
          <motion.div
            key={i}
            className="absolute w-2 h-2 rounded-full bg-secondary-container/30 z-20"
            style={{
              left: `${15 + i * 14}%`,
              top: `${20 + (i % 3) * 25}%`,
            }}
            animate={{
              y: [0, -20, 0],
              opacity: [0.2, 0.6, 0.2],
            }}
            transition={{
              duration: 4 + i * 0.5,
              repeat: Infinity,
              delay: i * 0.8,
            }}
          />
        ))}

        <div className="relative z-30 max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 w-full py-16">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <motion.div
              initial={{ opacity: 0, y: 40 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.8, delay: 0.2 }}
              className="lg:col-span-7 flex flex-col items-start"
            >
              <motion.div
                initial={{ opacity: 0, x: -20 }}
                animate={{ opacity: 1, x: 0 }}
                transition={{ delay: 0.4 }}
                className="inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.05em] text-secondary-container bg-secondary-container/10 border border-secondary-container/30 px-4 py-1.5 rounded-full mb-6 backdrop-blur-sm"
              >
                <span className="w-2 h-2 rounded-full bg-secondary-container animate-pulse" />
                Site Officiel — Député de la République
              </motion.div>

              <h1 className="font-heading text-[38px] sm:text-[48px] md:text-[56px] font-bold text-white leading-[1.1] mb-6">
                L&apos;Honorable
                <br />
                <span className="shimmer-gold">Ansoumane Fofana</span>
              </h1>

              <blockquote className="border-l-4 border-secondary-container pl-4 mb-8">
                <p className="text-white/90 text-[18px] md:text-[22px] font-heading italic leading-relaxed">
                  &ldquo;Servir le peuple, construire la nation&rdquo;
                </p>
              </blockquote>

              <p className="text-white/80 text-[16px] md:text-[18px] leading-relaxed mb-8 max-w-xl">
                Député de la République de Guinée et Président fondateur du RGA.
                Élu avec 70 738 voix pour porter la voix du peuple à
                l&apos;Assemblée nationale.
              </p>

              <div className="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                <Link
                  href="/mandat"
                  className="inline-flex items-center justify-center gap-2 bg-secondary-container text-on-surface px-8 py-3.5 rounded-sm font-bold text-[13px] uppercase tracking-[0.03em] hover:bg-secondary-container/90 transition-all shadow-lg hover:shadow-secondary-container/20"
                >
                  Découvrir le mandat <ArrowRight size={16} />
                </Link>
                <Link
                  href="/vision"
                  className="inline-flex items-center justify-center gap-2 border border-white/30 text-white px-8 py-3.5 rounded-sm font-bold text-[13px] uppercase tracking-[0.03em] hover:bg-white/10 transition-all backdrop-blur-sm"
                >
                  Notre vision
                </Link>
              </div>
            </motion.div>

            {/* Hero portrait overlay card */}
            <motion.div
              initial={{ opacity: 0, scale: 0.95 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ duration: 0.8, delay: 0.4 }}
              className="lg:col-span-5 hidden lg:flex justify-end"
            >
              <div className="relative w-full max-w-[380px] aspect-[3/4] rounded-xl overflow-hidden border-2 border-white/20 shadow-2xl group">
                <Image
                  src="/images/client/fofana-hero-suit.webp"
                  alt="Portrait officiel L'Honorable Ansoumane Fofana"
                  fill
                  sizes="(max-width: 1024px) 100vw, 380px"
                  priority
                  className="object-cover group-hover:scale-105 transition-transform duration-700"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-deep-forest/90 via-transparent to-transparent" />
                <div className="absolute bottom-4 left-4 right-4 p-4 rounded-lg bg-black/40 backdrop-blur-md border border-white/10 text-white">
                  <p className="font-heading font-semibold text-[16px] text-secondary-container">
                    L&apos;Honorable Ansoumane Fofana
                  </p>
                  <p className="text-[12px] text-white/80">
                    Président du RGA & Député National
                  </p>
                </div>
              </div>
            </motion.div>
          </div>
        </div>

        {/* Scroll indicator */}
        <motion.div
          className="absolute bottom-6 left-1/2 -translate-x-1/2 z-30"
          animate={{ y: [0, 8, 0] }}
          transition={{ duration: 2, repeat: Infinity }}
        >
          <ChevronDown className="text-white/50" size={28} />
        </motion.div>
      </section>

      {/* ===== STATUS STRIP ===== */}
      <div className="bg-primary-container/5 border-b border-border-elegant py-4">
        <div className="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-x-8 gap-y-2 text-center">
          {[
            "Député national",
            "Assemblée nationale de Guinée",
            "Président du RGA",
            "Engagement depuis 2010",
          ].map((item) => (
            <span
              key={item}
              className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted flex items-center gap-2"
            >
              <span className="w-1.5 h-1.5 rounded-full bg-primary-container" />
              {item}
            </span>
          ))}
        </div>
      </div>

      {/* ===== STATS ===== */}
      <section className="py-16 md:py-24 px-4 sm:px-6 lg:px-8 max-w-[1280px] mx-auto">
        <AnimatedSection className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
          {STATS.map((stat) => (
            <div
              key={stat.label}
              className="bg-surface-white p-6 border border-border-elegant rounded-lg flex flex-col items-center text-center soft-shadow premium-card hover:border-primary-container/40 transition-all"
            >
              <stat.icon className="text-primary-container mb-3" size={24} />
              <AnimatedCounter
                target={stat.target}
                suffix={stat.suffix}
                className="font-body text-[32px] sm:text-[38px] font-extrabold text-secondary leading-tight mb-1"
              />
              <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
                {stat.label}
              </span>
            </div>
          ))}
        </AnimatedSection>
      </section>

      {/* ===== INTRODUCTION ===== */}
      <section className="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-surface">
        <div className="max-w-[1280px] mx-auto">
          <AnimatedSection className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <div className="lg:col-span-7 flex flex-col gap-6 order-2 lg:order-1">
              <div>
                <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted block mb-2">
                  Introduction
                </span>
                <h2 className="font-heading text-[32px] md:text-[44px] font-bold text-primary leading-[1.15]">
                  Une vision pour la Guinée
                </h2>
              </div>
              <p className="text-on-surface-variant text-[16px] md:text-[18px] leading-relaxed">
                Leader politique, entrepreneur social et fervent défenseur des
                valeurs républicaines, l&apos;Honorable Ansoumane Fofana incarne
                une nouvelle génération de responsables guinéens. Son parcours
                est marqué par une volonté constante de bâtir des ponts entre
                l&apos;expérience acquise sur le terrain et la nécessité de
                réformes institutionnelles profondes.
              </p>
              <p className="text-on-surface-variant text-[16px] leading-relaxed">
                Fondateur et président du Rassemblement pour la Guinée (RGA)
                depuis 2010, il porte une vision de gouvernance méthodique et
                solidaire pour les 33 préfectures du pays.
              </p>
              <Link
                href="/parcours"
                className="inline-flex items-center gap-2 text-primary font-bold text-[14px] hover:text-deep-forest transition-colors w-fit pt-2"
              >
                En savoir plus sur son parcours <ArrowRight size={16} />
              </Link>
            </div>

            <div className="lg:col-span-5 flex justify-center order-1 lg:order-2">
              <motion.div
                whileHover={{ scale: 1.02 }}
                transition={{ type: "spring", stiffness: 300 }}
                className="relative w-full max-w-[420px] aspect-[3/4] rounded-xl overflow-hidden border border-border-elegant soft-shadow group"
              >
                <Image
                  src="/images/client/fofana-field-community.webp"
                  alt="L'Honorable Ansoumane Fofana sur le terrain avec les communautés"
                  fill
                  sizes="(max-width: 1024px) 100vw, 420px"
                  className="object-cover group-hover:scale-105 transition-transform duration-700"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-deep-forest/85 via-transparent to-transparent" />
                <div className="absolute bottom-4 left-4 right-4 text-white text-sm font-heading font-medium">
                  Rencontre communautaire dans les préfectures de Guinée
                </div>
              </motion.div>
            </div>
          </AnimatedSection>
        </div>
      </section>

      {/* ===== VALUES ===== */}
      <section className="relative py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-primary-container overflow-hidden">
        <div className="glow-spot w-[400px] h-[400px] bg-secondary-container top-[-100px] left-[-100px]" />
        <div className="glow-spot w-[300px] h-[300px] bg-tertiary bottom-[-80px] right-[-80px]" />

        <div className="max-w-[1280px] mx-auto relative z-10">
          <AnimatedSection className="text-center mb-12">
            <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-on-primary-container block mb-2">
              Nos piliers
            </span>
            <h2 className="font-heading text-[32px] md:text-[44px] font-bold text-white">
              Vérité · Loyauté · Paix
            </h2>
          </AnimatedSection>

          <AnimatedSection className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {VALUES.map((value) => (
              <motion.div
                key={value.title}
                whileHover={{ y: -6 }}
                transition={{ type: "spring", stiffness: 400, damping: 25 }}
                className="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 text-center"
              >
                <div className="w-14 h-14 rounded-full bg-secondary-container/20 flex items-center justify-center mx-auto mb-5">
                  <value.icon className="text-secondary-container" size={28} />
                </div>
                <h3 className="font-heading text-[24px] font-semibold text-white mb-3">
                  {value.title}
                </h3>
                <p className="text-white/80 text-[15px] leading-relaxed">
                  {value.description}
                </p>
              </motion.div>
            ))}
          </AnimatedSection>
        </div>
      </section>

      {/* ===== CTA BANNER ===== */}
      <section className="relative py-20 md:py-28 px-4 sm:px-6 lg:px-8 bg-deep-forest overflow-hidden">
        <div className="glow-spot w-[500px] h-[500px] bg-primary-container top-[-200px] right-[-200px]" />
        <div className="max-w-[1280px] mx-auto text-center relative z-10">
          <AnimatedSection>
            <h2 className="font-heading text-[32px] md:text-[44px] font-bold text-white mb-4">
              Rejoignez le mouvement
            </h2>
            <p className="text-white/70 text-[16px] md:text-[18px] max-w-xl mx-auto mb-8 leading-relaxed">
              Ensemble, construisons une Guinée méthodique et solidaire.
              Participez au changement avec le RGA.
            </p>
            <div className="flex flex-col sm:flex-row justify-center gap-4">
              <Link
                href="/contact"
                className="inline-flex items-center justify-center gap-2 bg-secondary-container text-on-surface px-8 py-3.5 rounded-sm font-bold text-[13px] uppercase tracking-[0.03em] hover:bg-secondary-container/90 transition-all shadow-lg"
              >
                Nous rejoindre <ArrowRight size={16} />
              </Link>
              <a
                href="https://wa.me/224627249666"
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center justify-center gap-2 bg-[#25D366] text-white px-8 py-3.5 rounded-sm font-bold text-[13px] uppercase tracking-[0.03em] hover:bg-[#20bd5a] transition-all shadow-lg"
              >
                WhatsApp
              </a>
            </div>
          </AnimatedSection>
        </div>
      </section>
    </div>
  );
}
